<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [function () {
    return redirect(route('home'));
}])->name('root');

Route::group(['prefix' => config('app.locale')], function() {
    Route::group(['prefix' => '/token'], function () {
        Route::get('/', 'ContentController@home')->name('home');
        Route::get('/airdrop', 'ContentController@home')->name('airdrop');
        Route::get('/mvp', 'ContentController@mvp')->name('mvp');
        Route::get('/signup', 'ParticipantController@showSignUp')->name('signup');
        Route::get('/signup/{platform}', 'ParticipantController@showSignUp')->name('signup-platform');
        Route::post('/join', 'ParticipantController@join')->name('join');
        Route::post('/signup', 'ParticipantController@signUp')->name('signup-post');
        Route::get('/login', 'ParticipantController@showLogIn')->name('login');
        Route::get('/login/{platform}', 'ParticipantController@showLogIn')->name('login-platform');
        Route::post('/login', 'ParticipantController@logIn')->name('login-post');
        Route::get('/logout', 'ParticipantController@logOut')->name('logout');
        Route::get('/faq', 'ContentController@faq')->name('faq');
        Route::get('/user', 'ParticipantController@user')->name('user');
        Route::get('/auth/{participant}/{token}/{destination?}', 'ParticipantController@auth')->name('auth');

        // @todo move under auth middleware
        Route::get('/icologin', 'ParticipantController@icologin')->name('icologin');
        Route::get('/crowdsaleaddress', 'ParticipantController@crowdsaleaddress')->name('crowdsaleaddress');

        // User area
        Route::group(['middleware' => 'auth'], function () {
            Route::post('/profile', 'ParticipantController@updateProfile')->name('participant-profile');
            Route::get('/user', 'ParticipantController@user')->name('user');
            Route::get('/affiliate', 'ParticipantController@affiliate')->name('affiliate');

            Route::get('/ico', 'ContentController@ico')->name('ico');
            Route::get('/ico/address', 'ContentController@icoAddress')->name('ico-address');
            Route::post('/ico', 'ParticipantController@joinICO')->name('ico-post');
        });

        // Statistics and mailing list export
        Route::get('/admin/stats', 'AdminController@stats')->name('admin.stats');
        Route::get('/admin/emails', 'AdminController@emails')->name('admin.emails');

        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    });

    Route::get('/course/{course}/lesson/{lesson}', 'ContentController@lesson')->name('lesson');
    Route::get('/course/{course}', 'ContentController@course')->name('course');
    Route::get('/landing/course/{course}', 'ContentController@redirectLanding');
});

