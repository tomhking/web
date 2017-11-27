<?php

namespace App\Http\Controllers;

use App\AuthToken;
use App\Events\LogIn;
use App\Participant;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
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
            return redirect(route('login', ['email' => $request->get('email')]));
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
                return redirect(route('login', ['email' => $participant->email]));
            }

            $authToken = $participant->authTokens()->save(new AuthToken);
            event(new LogIn($participant, $authToken, $request->segment(1)));
            return redirect(route('login').'?success');
        }

        if($captchaRequired) {
            return redirect(route('signup', ['email' => $request->get('email')]));
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

        return redirect(route('signup').'?success');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function signUp(Request $request) {
        $this->validate($request, [
            'name' => 'string|min:2|max:60',
            'email' => 'required|string|email|max:250',
            'g-recaptcha-response' => 'required|recaptcha',
            'platform' => 'platform',
        ]);

        $participant = Participant::where('email', '=', $request->get('email'))->first();

        if($participant instanceof Participant) {
            $authToken = $participant->authTokens()->save(new AuthToken);
            event(new LogIn($participant, $authToken, $request->segment(1), $request->get('platform')));

            $participant->captcha_verified = true;
            $participant->save();

            return response()->json(['success' => true, 'login' => true]);
        }

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

        return response()->json(['success' => true, 'login' => false]);
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
        return redirect(route('home'))->withCookie(
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

            return redirect(route('user'))->withCookie(
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
        $icoAddress = env('ICO_ADDRESS');

        if(empty($icoAddress)){
            return response()->json([
                'error' => 'Registrations for ICO are not yet available.'
            ], 403);
        }

        $email = strtolower($request->get('email', ''));
        $participant = Participant::where('email', '=', $email)->first();

        if($participant instanceof Participant) {
            $authToken = $participant->authTokens()->save(new AuthToken);
            $authToken->use();
            return redirect(route('ico-address'))->withCookie(
                new Cookie('auth', $authToken->key, Carbon::now()->addSeconds(AuthToken::TTL), '/')
            );
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:250',
        ]);

        if($validator->fails()) {
            return redirect(route('ico'));
        }

        $participant = new Participant();

        $participant->email = strtolower($request->get('email'));
        $participant->ip = $request->ip();

        $participant->save();

        $authToken = $participant->authTokens()->save(new AuthToken);
        $authToken->use();
        return redirect(route('ico-address'))->withCookie(
            new Cookie('auth', $authToken->key, Carbon::now()->addSeconds(AuthToken::TTL), '/')
        );
    }

    /**
     * Updates the progile of a logged in user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function updateProfile(Request $request) {
        $participant = Participant::getCurrent();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:2|max:35',
            'last_name' => 'required|string|min:2|max:35',
            'country' => 'required|string|valid-country',
            'birthday' => 'required|date',
        ]);

        if($validator->fails()) {
            return redirect(route('ico-address'));
        }

        $participant->first_name = $request->get('first_name');
        $participant->last_name = $request->get('last_name');
        $participant->country = $request->get('country');
        $participant->birthday = $request->get('birthday');

        $participant->save();

        return redirect(route('ico-address'));
    }

    /**
     * @return \Illuminate\View\View
     */
    function user() {
        return view('pages.user');
    }

    function icologin() {
        return view('pages.icologin');
    }

    function crowdsaleaddress() {
        return view('pages.crowdsaleaddress');
    }

    /**
     * @return \Illuminate\View\View
     */
    function affiliate() {
        return view('pages.affiliate');
    }

    /**
     * Sets affiliate cookie
     *
     * @param $id
     * @return $this
     */
    public function setAffiliateCookie($id)
    {
        return redirect(route_lang('home', ['lang' => 'en']))->withCookie(
            new Cookie('bd-aff', (int) $id > 0 ? (int) $id : 0, Carbon::now()->addMonths(3))
        );
    }
}
