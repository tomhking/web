<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Events\LogIn;

$router->get('/', ['as' => 'root', function () use ($router) {
    return redirect(route_lang('home'));
}]);

$router->group(['prefix' => '{lang}', 'middleware' => 'lang'], function() use ($router) {
    $router->get('/token/', ['as' => 'home', function (\Illuminate\Http\Request $request) use ($router) {
        $from000 = $request->get('utm_source') === '000' || $request->cookie('utm_source') === '000';
        $response = response(view('pages.home', [
            'from000' => $from000,
            'email' => filter_var($request->get('email'), FILTER_VALIDATE_EMAIL) ? $request->get('email') : '',
        ])->render());

        if($from000) {
            $response->withCookie(new \Symfony\Component\HttpFoundation\Cookie(
                'utm_source', '000', \Carbon\Carbon::now()->addYear()
            ));
        }

        return $response;
    }]);

    $router->get('/token/mvp', ['as' => 'mvp', function () {
        $courses = app()->make('courses');
        return view('pages.mvp', compact('courses'));
    }]);

    $router->get('/token/ico', ['as' => 'ico', function (\Illuminate\Http\Request $request) {
        if (env('APP_ENV', 'production') != 'local' && $request->get('key') != env('ICO_PREVIEW_KEY')) {
            abort(404);
        }

        $icoStart = \Carbon\Carbon::createFromTimestamp(env('ICO_STARTS_AT'));
        $icoEnd = \Carbon\Carbon::createFromTimestamp(env('ICO_ENDS_AT'));
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
                    $icoStart = \Carbon\Carbon::today()->addDay();
                    $icoEnd = $icoStart->copy()->addDay();
                    $icoDataAvailable = $request->get('mock') == 'pre_ico_addr_available';
                    break;
                case "ico_started_pre_softcap":
                case "ico_started_pre_hardcap":
                    $icoStart = \Carbon\Carbon::today()->subDay();
                    $icoEnd = \Carbon\Carbon::today()->addDays(2);
                    $raisedEth = ($request->get('mock') == "ico_started_pre_softcap" ? $softCapEth : $hardCapEth) / 2;
                    $icoDataAvailable = true;
                    break;
                case "ico_ended_pre_softcap":
                case "ico_ended_pre_hardcap":
                case "ico_ended_hardcap":
                    $icoStart = \Carbon\Carbon::today()->subDay();
                    $icoEnd = \Carbon\Carbon::today();
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
    }]);

    $router->get('/token/signup', ['as' => 'signup', function (\Illuminate\Http\Request $request) {
        if($request->has('email') && \App\Participant::where('email', '=', $request->get('email'))->first() instanceof \App\Participant) {
            return redirect(route_lang('login', ['email' => $request->get('email')]));
        }

        return view('pages.signup', [
            'email' => $request->get('email'),
            'success' => $request->has('success'),
        ]);
    }]);

    $router->post('/token/join', ['as' => 'join', function(\Illuminate\Http\Request $request) {
        $this->validate($request, [
            'email' => 'required|string|email|max:250'
        ]);

        $participant = \App\Participant::where('email', '=', $request->get('email'))->first();
        $captchaRequired = \App\AuthToken::byIp($request->ip())->lastHour()->count() >= 5;

        if($participant instanceof \App\Participant) {
            if($captchaRequired) {
                return redirect(route_lang('login', ['email' => $participant->email]));
            }

            $authToken = $participant->authTokens()->save(new \App\AuthToken);
            event(new LogIn($participant, $authToken, $request->segment(1)));
            return redirect(route_lang('login').'?success');
        }

        if($captchaRequired) {
            return redirect(route_lang('signup', ['email' => $request->get('email')]));
        }

        $participant = new \App\Participant();
        $participant->email = $request->get('email');
        $participant->ip = $request->ip();

        $name = ucwords(str_replace("."," ", explode("@", $request->get('email'))[0]));
        $nameParts = explode(" ", $name);

        $participant->first_name = $nameParts[0];
        $participant->last_name = count($nameParts) > 1 ? implode(" ", array_slice($nameParts, 1)) : null;

        $participant->save();

        $authToken = $participant->authTokens()->save(new \App\AuthToken);
        event(new \App\Events\FreeTokenSignup($participant, $authToken, $request->segment(1)));

        return redirect(route_lang('signup').'?success');
    }]);

    $router->post('/token/signup', ['as' => 'signup-post', function (\Illuminate\Http\Request $request) {
        $this->validate($request, [
            'name' => 'string|min:2|max:60',
            'email' => 'required|string|email|max:250|unique:participants,email',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $participant = new \App\Participant();

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

        $authToken = $participant->authTokens()->save(new \App\AuthToken);
        event(new \App\Events\FreeTokenSignup($participant, $authToken, $request->segment(1)));

        return response()->json(['success' => true]);
    }]);

    $router->get('/token/login', ['as' => 'login', function (\Illuminate\Http\Request $request) {
        return view('pages.login', [
            'email' => $request->get('email'),
            'success' => $request->has('success'),
        ]);
    }]);

    $router->post('/token/login', ['as' => 'login-post', function (\Illuminate\Http\Request $request) {
        $this->validate($request, [
            'email' => 'required|email|exists:participants,email',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $participant = \App\Participant::where('email', '=', $request->get('email'))->first();

        if($participant instanceof \App\Participant) {
            $authToken = $participant->authTokens()->save(new \App\AuthToken);
            event(new LogIn($participant, $authToken, $request->segment(1)));

            $participant->captcha_verified = true;
            $participant->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => trans('user.no_account')], 422);
    }]);

    $router->get('/token/logout', ['as' => 'logout', function (\Illuminate\Http\Request $request) {
        $key = $request->cookie('auth');
        if(!empty($key)){
            $token = \App\AuthToken::byKey($key)->first();
            if($token instanceof \App\AuthToken) {
                $token->invalidate();
            }
        }
        return redirect(route_lang('home'))->withCookie(
            new \Symfony\Component\HttpFoundation\Cookie('auth','',0)
        );
    }]);

    $router->get('/token/auth/{participant}/{token}', ['as' => 'auth', function (\Illuminate\Http\Request $request, $language, $id, $key) {
        $participant = \App\Participant::findOrFail($id);
        $authToken = $participant->authTokens()->byKey($key)->first();

        if($authToken instanceof \App\AuthToken && $authToken->isUsable()) {
            if(!$participant->email_verified) {
                $participant->email_verified = true;
                $participant->save();
            }

            $authToken->use();

            return redirect(route_lang('user'))->withCookie(
                new \Symfony\Component\HttpFoundation\Cookie('auth', $authToken->key, \Carbon\Carbon::now()->addSeconds(\App\AuthToken::TTL), '/')
            );
        }

        return view('pages.notification', [
            'message' => trans('user.link_expired'),
        ]);
    }]);

    $router->post('/token/ico', ['as' => 'ico-post', function (\Illuminate\Http\Request $request) {
        $endDate = \Carbon\Carbon::createFromTimestamp(env('ICO_ENDS_AT'));
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

        if(\App\Participant::where('ip', $request->ip())->count() > 10) {
            return response()->json(['success' => true,])->withCookie(
                new \Symfony\Component\HttpFoundation\Cookie('participant', $request->ip(), $endDate->addDay())
            );
        }

        $participant = new \App\Participant();

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
            new \Symfony\Component\HttpFoundation\Cookie('participant', $participant->id, $endDate->addDay())
        );
    }]);

    $router->get('/token/faq', ['as' => 'faq', function () {
        return view('pages.faq');
    }]);

    $router->get('/course/{course}/lesson/{lesson}', ['as' => 'lesson', function ($course, $lesson) {
        $availableCourses = collect(app()->make('courses'))->keyBy('key');
        if($availableCourses->has($course)) {
            if($lesson != 'intro') {
                return redirect(route_lang('lesson', ['course' => $course, 'lesson' => 'intro']));
            }

            $hasLanding = file_exists(resource_path('views/pages/courses/'.$course.'/landing.blade.php'));

            return view('pages.courses.'.$course.'.lesson-'.$lesson, compact('course', 'lesson', 'hasLanding'));
        }

        abort(404);
    }]);

    $router->get('/course/{course}', ['as' => 'course', function ($course) {
        $availableCourses = collect(app()->make('courses'))->keyBy('key');
        if($availableCourses->has($course)) {
            if(!file_exists(resource_path('views/pages/courses/'.$course.'/landing.blade.php'))) {
                return redirect(route_lang('lesson', ['course' => $course, 'lesson' => 'intro']));
            }
            return view('pages.courses.'.$course.'.landing');
        }

        abort(404);
    }]);

    $router->get('/landing/course/{course}', function ($course) {
        $mappings = [
            'web-developer' => 'full-stack-web-developer',
            'smart-contract-developer' => 'smart-contracts',
        ];
        return redirect(route_lang('course', ['course' => $mappings[$course] ?? $course]), 301);
    });

    $router->get('/token/user', ['as' => 'user', 'middleware' => 'auth', function () {
        return view('pages.user');
    }]);

    $router->get('/landing/course/smart-contract-developer', ['as' => 'smart-contract-developer', function () {
        return view('pages.courses.smart-contract-developer-landing');
    }]);
});
