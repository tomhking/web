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
    return redirect()->route('home');
}]);

$router->get('/token/', ['as' => 'home', function () use ($router) {
    return view('pages.home');
}]);

$router->get('/token/mvp', ['as' => 'mvp', function () {
    $courses = app()->make('courses');
    return view('pages.mvp', compact('courses'));
}]);

$router->get('/token/faq', ['as' => 'faq', function () use ($router) {
    return view('pages.faq');
}]);


$router->get('/token/course/{course}', ['as' => 'course', function ($course) {
    return view('pages.courses.'.$course, compact('courses'));
}]);
