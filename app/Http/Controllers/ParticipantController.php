<?php

namespace App\Http\Controllers;

use App\AuthToken;
use App\Events\LogIn;
use App\Participant;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class ParticipantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param Request $request
     * @param string $platform
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Laravel\Lumen\Http\Redirector
     */
    public function showSignUp(Request $request, $platform = ''){
        if($request->has('email') && Participant::where('email', '=', $request->get('email'))->first() instanceof Participant) {
            return redirect(route_lang('login', ['email' => $request->get('email')]));
        }

        return view('pages.signup', [
            'email' => $request->get('email'),
            'success' => $request->has('success'),
            'platform' => config('platforms')[$platform] ?? false ? $platform : false,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    function join(Request $request) {
        $this->validate($request, [
            'email' => 'required|string|email|max:250'
        ]);

        $participant = Participant::where('email', '=', $request->get('email'))->first();
        $captchaRequired = AuthToken::byIp($request->ip())->lastHour()->count() >= 5;

        if($participant instanceof \App\Participant) {
            if($captchaRequired) {
                return redirect(route_lang('login', ['email' => $participant->email]));
            }

            $authToken = $participant->authTokens()->save(new AuthToken);
            event(new LogIn($participant, $authToken, $request->segment(1)));
            return redirect(route_lang('login').'?success');
        }

        if($captchaRequired) {
            return redirect(route_lang('signup', ['email' => $request->get('email')]));
        }

        $participant = new Participant();
        $participant->email = $request->get('email');
        $participant->ip = $request->ip();

        $name = ucwords(str_replace("."," ", explode("@", $request->get('email'))[0]));
        $nameParts = explode(" ", $name);

        $participant->first_name = $nameParts[0];
        $participant->last_name = count($nameParts) > 1 ? implode(" ", array_slice($nameParts, 1)) : null;

        $participant->save();

        $authToken = $participant->authTokens()->save(new AuthToken);
        event(new \App\Events\FreeTokenSignup($participant, $authToken, $request->segment(1)));

        return redirect(route_lang('signup').'?success');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function signUp(Request $request) {
        $this->validate($request, [
            'name' => 'string|min:2|max:60',
            'email' => 'required|string|email|max:250|unique:participants,email',
            'g-recaptcha-response' => 'required|recaptcha',
            'platform' => 'platform',
        ]);

        $participant = new Participant();

        $participant->email = $request->get('email');
        $participant->ip = $request->ip();

        $name = $request->get('name');

        if(empty($name)) {
            $name = ucwords(str_replace("."," ", explode("@", $request->get('email'))[0]));
        }

        $nameParts = explode(" ", $name);

        $participant->first_name = $nameParts[0];
        $participant->last_name = count($nameParts) > 1 ? implode(" ", array_slice($nameParts, 1)) : null;
        $participant->captcha_verified = true;

        $participant->save();

        $authToken = $participant->authTokens()->save(new AuthToken);
        event(new \App\Events\FreeTokenSignup($participant, $authToken, $request->segment(1), $request->get('platform')));

        return response()->json(['success' => true]);
    }

    /**
     * @param Request $request
     * @param string $platform
     * @return \Illuminate\View\View
     */
    function showLogIn(Request $request, $platform = '') {
        return view('pages.login', [
            'email' => $request->get('email'),
            'success' => $request->has('success'),
            'platform' => config('platforms')[$platform] ?? false ? $platform : false,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function logIn(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|exists:participants,email',
            'g-recaptcha-response' => 'required|recaptcha',
            'platform' => 'platform',
        ]);

        $participant = Participant::where('email', '=', $request->get('email'))->first();

        if($participant instanceof \App\Participant) {
            $authToken = $participant->authTokens()->save(new AuthToken);
            event(new LogIn($participant, $authToken, $request->segment(1), $request->get('platform')));

            $participant->captcha_verified = true;
            $participant->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => trans('user.no_account')], 422);
    }

    /**
     * @param Request $request
     * @return $this
     */
    function logOut(Request $request) {
        $key = $request->cookie('auth');
        if(!empty($key)){
            $token = AuthToken::byKey($key)->first();
            if($token instanceof AuthToken) {
                $token->invalidate();
            }
        }
        return redirect(route_lang('home'))->withCookie(
            new Cookie('auth','',0)
        );
    }

    /**
     * @param $lang
     * @param $participant
     * @param $token
     * @param string $destination
     * @return $this|\Illuminate\View\View
     */
    function auth($lang, $participant, $token, $destination = '') {
        $participant = Participant::findOrFail($participant);
        $authToken = $participant->authTokens()->byKey($token)->first();

        if($authToken instanceof AuthToken && $authToken->isUsable()) {
            if(!$participant->email_verified) {
                $participant->email_verified = true;
                $participant->save();
            }

            $authToken->use();

            $platform = config('platforms');

            if($destination = $platform[$destination] ?? false) {
                $jwt = JWT::encode([
                    'iss' => route('root'),
                    'aud' => $destination['audience'],
                    'iat' => Carbon::now()->timestamp,
                    'exp' => Carbon::now()->addDays(2)->timestamp,
                    'user' => $participant
                ], env('JWT_SECRET'));

                return redirect(str_replace('{token}', $jwt, $destination['redirect']));
            }

            return redirect(route_lang('user'))->withCookie(
                new Cookie('auth', $authToken->key, Carbon::now()->addSeconds(AuthToken::TTL), '/')
            );
        }

        return view('pages.notification', [
            'message' => trans('user.link_expired'),
        ]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\JsonResponse
     */
    function joinICO(Request $request) {
        $endDate = Carbon::createFromTimestamp(env('ICO_ENDS_AT'));
        $icoDataAvailable = (bool) env('ICO_INFO_AVAILABLE', false);

        if(!$icoDataAvailable){
            return response()->json([
                'error' => 'Registrations for ICO are not yet available.'
            ], 403);
        }

        $this->validate($request, [
            'first-name' => 'required|string|min:2|max:35',
            'last-name' => 'required|string|min:2|max:35',
            'email' => 'required|string|email|max:250',
            'phone' => 'required|string|min:8|max:20',
            'country' => 'required|string|valid-country',
            'birthday' => 'required|date',
            'wallet' => 'required|string|size:42',
        ]);

        if(Participant::where('ip', $request->ip())->count() > 10) {
            return response()->json(['success' => true,])->withCookie(
                new Cookie('participant', $request->ip(), $endDate->addDay())
            );
        }

        $participant = new Participant();

        $participant->first_name = $request->get('first-name');
        $participant->last_name = $request->get('last-name');
        $participant->email = strtolower($request->get('email'));
        $participant->phone_number = $request->get('phone');
        $participant->country = $request->get('country');
        $participant->birthday = $request->get('birthday');
        $participant->wallet = $request->get('wallet');
        $participant->ip = $request->ip();

        $participant->save();

        return response()->json(['success' => true,])->withCookie(
            new Cookie('participant', $participant->id, $endDate->addDay())
        );
    }

    /**
     * @return \Illuminate\View\View
     */
    function user() {
        return view('pages.user');
    }
}
