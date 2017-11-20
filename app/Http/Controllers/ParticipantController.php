<?php

namespace App\Http\Controllers;

use App\AuthToken;
use App\Events\LogIn;
use App\Participant;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
     * Displays ICO page
     * @param Request $request
     * @return \Illuminate\View\View
     */
    function ico(Request $request) {
        if (env('APP_ENV', 'production') != 'local' && $request->get('key') != env('ICO_PREVIEW_KEY')) {
            abort(404);
        }

        $icoStart = Carbon::createFromTimestamp(env('ICO_STARTS_AT'));
        $icoEnd = Carbon::createFromTimestamp(env('ICO_ENDS_AT'));
        $icoDataAvailable = (bool) env('ICO_INFO_AVAILABLE', false);

        $showAddress = $icoDataAvailable && !!$request->cookie('participant', false);

        $raisedDecimals = 4;
        $raised = Cache::get('ico_balance', ['balance' => 0])['balance'] ?? 0;
        $raisedEth = bcdiv($raised, bcpow(10, 18 - $raisedDecimals)) / pow(10, $raisedDecimals);

        $hardCapEth = env('ICO_HARD_CAP');
        $softCapEth = env('ICO_SOFT_CAP');

        $progress = $raisedEth / $hardCapEth * 100;

        $icoAddress = env('ICO_ADDRESS');
        $icoRate = env('ICO_RATE');
        $totalSupply = env('TOKEN_SUPPLY');

        $countries = app()->make('countries');
        $blacklistedCountries = ['US', 'VI', 'UM', 'PR', 'AS', 'GU', 'MP', 'CN'];
        $currentCountry = false;

        try {
            $result = app()->make('geoip')->country($request->ip());

            if($result instanceof \GeoIp2\Model\Country) {
                $currentCountry = $result->country->isoCode;
            }
        }catch (\GeoIp2\Exception\AddressNotFoundException $e) {
            //
        }


        if($request->get('key') == env('ICO_PREVIEW_KEY') && $request->has('mock')) {
            switch ($request->get('mock')) {
                case "pre_ico_addr_unavailable":
                case "pre_ico_addr_available":
                    $icoStart = Carbon::today()->addDay();
                    $icoEnd = $icoStart->copy()->addDay();
                    $icoDataAvailable = $request->get('mock') == 'pre_ico_addr_available';
                    break;
                case "ico_started_pre_softcap":
                case "ico_started_pre_hardcap":
                    $icoStart = Carbon::today()->subDay();
                    $icoEnd = Carbon::today()->addDays(2);
                    $raisedEth = ($request->get('mock') == "ico_started_pre_softcap" ? $softCapEth : $hardCapEth) / 2;
                    $icoDataAvailable = true;
                    break;
                case "ico_ended_pre_softcap":
                case "ico_ended_pre_hardcap":
                case "ico_ended_hardcap":
                    $icoStart = Carbon::today()->subDay();
                    $icoEnd = Carbon::today();
                    $raisedEth = ($request->get('mock') == "ico_ended_pre_softcap" ? $softCapEth : $hardCapEth) / 2;
                    $raisedEth = $request->get('mock') == "ico_ended_hardcap" ? $hardCapEth : $raisedEth;
                    break;
            }

            $showAddress = $icoDataAvailable && $request->has('participant');
            $progress = $raisedEth / $hardCapEth * 100;
        }

        return view('pages.ico', compact(
            'icoStart',
            'icoEnd',
            'raised',
            'icoAddress',
            'hardCapEth',
            'softCapEth',
            'raisedEth',
            'showAddress',
            'countries',
            'currentCountry',
            'blacklistedCountries',
            'raisedDecimals',
            'progress',
            'icoDataAvailable',
            'icoRate',
            'totalSupply'
        ));
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
            return redirect(route_lang('ico-address'))->withCookie(
                new Cookie('auth', $authToken->key, Carbon::now()->addSeconds(AuthToken::TTL), '/')
            );
        }

        $this->validate($request, [
            'email' => 'required|string|email|max:250',
        ]);

        $participant = new Participant();

        $participant->email = strtolower($request->get('email'));
        $participant->ip = $request->ip();

        $participant->save();

        $authToken = $participant->authTokens()->save(new AuthToken);
        $authToken->use();
        return redirect(route_lang('ico-address'))->withCookie(
            new Cookie('auth', $authToken->key, Carbon::now()->addSeconds(AuthToken::TTL), '/')
        );
    }

    public function updateProfile(Request $request) {
        $participant = Participant::getCurrent();

        $this->validate($request, [
            'first_name' => 'required|string|min:2|max:35',
            'last_name' => 'required|string|min:2|max:35',
            'country' => 'required|string|valid-country',
            'birthday' => 'required|date',
        ]);

        $participant->first_name = $request->get('first_name');
        $participant->last_name = $request->get('last_name');
        $participant->country = $request->get('country');
        $participant->birthday = $request->get('birthday');

        $participant->save();

        return redirect(route_lang('ico-address'));
    }

    /**
     * @return \Illuminate\View\View
     */
    function user() {
        return view('pages.user');
    }
}
