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
    $router->get('/token/', ['as' => 'home', 'uses' => 'ContentController@home']);
    $router->get('/token/airdrop', ['as' => 'airdrop', 'uses' => 'ContentController@home']);
    $router->get('/token/mvp', ['as' => 'mvp', 'uses' => 'ContentController@mvp']);
    $router->get('/token/ico', ['as' => 'ico', 'uses' => 'ContentController@ico']);
    $router->get('/token/signup', ['as' => 'signup', 'uses' => 'ParticipantController@showSignUp']);
    $router->get('/token/signup/{platform}', ['as' => 'signup-platform', 'uses' => 'ParticipantController@showSignUp']);
    $router->post('/token/join', ['as' => 'join', 'uses' => 'ParticipantController@join']);
    $router->post('/token/signup', ['as' => 'signup-post', 'uses' => 'ParticipantController@signUp']);
    $router->get('/token/login', ['as' => 'login', 'uses' => 'ParticipantController@showLogIn']);
    $router->get('/token/login/{platform}', ['as' => 'login-platform', 'uses' => 'ParticipantController@showLogIn']);
    $router->post('/token/login', ['as' => 'login-post', 'uses' => 'ParticipantController@logIn']);
    $router->get('/token/logout', ['as' => 'logout', 'uses' => 'ParticipantController@logOut']);
    $router->get('/token/user', ['as' => 'user', 'uses' => 'ParticipantController@user']);
    $router->get('/token/auth/{participant}/{token}[/{destination}]', ['as' => 'auth', 'uses' => 'ParticipantController@auth']);
    $router->post('/token/ico', ['as' => 'ico-post', 'uses' => 'ParticipantController@joinICO']);
    $router->get('/token/faq', ['as' => 'faq', 'uses' => 'ContentController@faq']);
    $router->get('/course/{course}/lesson/{lesson}', ['as' => 'lesson', 'uses' => 'ContentController@lesson']);
    $router->get('/course/{course}', ['as' => 'course', 'uses' => 'ContentController@course']);
    $router->get('/landing/course/{course}', ['uses' => 'ContentController@redirectLanding']);
    $router->get('/token/user', ['as' => 'user', 'middleware' => 'auth', 'uses' => 'ParticipantController@user']);

    $router->get('/token/admin/stats', ['as' => 'admin.stats', 'uses' => 'AdminController@stats']);
    $router->get('/token/admin/emails', ['as' => 'admin.emails', 'uses' => 'AdminController@emails']);
});
