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

Route::get('a/{id}', 'UserController@setAffiliateCookie')->name('affiliate-cookie');

Route::group(['prefix' => $locale = language_prefix()], function() use ($locale) {
    App::setLocale($locale);

    Route::group(['prefix' => '/token'], function () {
        Route::get('/', 'ContentController@home')->name('home');
        Route::get('/airdrop', 'ContentController@home')->name('airdrop');
        Route::get('/mvp', 'ContentController@mvp')->name('mvp');
        Route::get('/faq', 'ContentController@faq')->name('faq');

        // User area
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/user', 'UserController@user')->name('user');
            Route::get('/affiliate', 'UserController@affiliate')->name('affiliate');
            Route::get('/address', 'UserController@address')->name('address');
            Route::get('/profile', 'UserController@showDetails')->name('details');
            Route::post('/profile', 'UserController@details');
            Route::get('/identification', 'UserController@showIdentification')->name('identification');
            Route::post('/identification', 'UserController@identification');
            Route::get('/password', 'UserController@showPassword')->name('password');
            Route::post('/password', 'UserController@password');
            Route::get('/participate', 'UserController@participate')->name('participate');
            Route::get('/participate2', 'UserController@participate2')->name('participate2');
            Route::get('/participate3', 'UserController@participate3')->name('participate3');
            Route::get('/participatefaq', 'UserController@participatefaq')->name('participatefaq');
        });

        // Statistics and mailing list export
        // Route::get('/admin/stats', 'AdminController@stats')->name('admin.stats'); @todo
        // Route::get('/admin/emails', 'AdminController@emails')->name('admin.emails'); @todo

        // Authentication Routes...
        Route::get('login/{destination?}', 'Auth\LoginController@showLoginForm')->name('login');
        Route::get('platform/{destination}', 'Auth\LoginController@platformLogin')->name('platform-login');
        Route::post('login', 'Auth\LoginController@loginOrSignUp');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

        // Email verification routes...
        Route::get('verify/{id}/{token}', 'Auth\EmailVerificationController@verify')->name('verify-email');
    });

    Route::get('/course/{course}/lesson/{lesson}', 'ContentController@lesson')->name('lesson');
    Route::get('/course/{course}', 'ContentController@course')->name('course');
    Route::get('/landing/course/{course}', 'ContentController@redirectLanding');
});

