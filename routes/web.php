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

$router->get('/', ['as' => 'root', function () use ($router) {
    return redirect(route_lang('home'));
}]);

$router->group(['prefix' => '{lang}', 'middleware' => 'lang'], function() use ($router) {
    $router->get('/token/', ['as' => 'home', function () use ($router) {
        return view('pages.home');
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
        $timeLeft = $icoStart->isPast() ? 0 : $icoStart->diffInSeconds(\Carbon\Carbon::now());

        $raisedDecimals = 4;
        $raised = Cache::get('ico_balance', ['balance' => 0])['balance'] ?? 0;
        $raisedEth = bcdiv($raised, bcpow(10, 18 - $raisedDecimals)) / pow(10, $raisedDecimals);

        $hardCapEth = env('ICO_HARD_CAP');
        $softCapEth = env('ICO_SOFT_CAP');

        $progress = $raisedEth / $hardCapEth * 100;

        $icoAddress = env('ICO_ADDRESS');

        $countries = app()->make('countries');

        return view('pages.ico', compact(
            'timeLeft',
            'icoStart',
            'icoEnd',
            'raised',
            'icoAddress',
            'hardCapEth',
            'softCapEth',
            'raisedEth',
            'showAddress',
            'countries',
            'raisedDecimals',
            'progress',
            'icoDataAvailable'
        ));
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
        $participant->email = $request->get('email');
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

    $router->get('/token/course/{course}', ['as' => 'course', function ($course) {
        return view('pages.courses.'.$course, compact('courses'));
    }]);
});
