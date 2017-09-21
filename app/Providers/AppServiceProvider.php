<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('validCountry', function ($attribute, $value, $parameters) {
            $countries = app()->make('countries');
            return isset($countries[$value]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('countries', function(){
            return json_decode(file_get_contents(base_path('vendor/umpirsky/country-list/data/en_US/country.json')), true);
        });

        $this->app->singleton('courses', function ($app) {
            return [
                [
                    'url' => 'https://www.bitdegree.org/learn/web-fundamentals/',
                    'key' => 'web-fundamentals',
                    'image' => asset('web-development.png'),
                    'overlay' => 'green',
                    'title' => trans('courses.title_web_fundamentals'),
                    'description' => 'Available Beta',
                    'isFree' => true,
                ],
                [
                    'url' => route('course', ['course' => 'coding-fundamentals']),
                    'key' => 'coding-fundamentals',
                    'image' => asset('coding-fundamentals.png'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_coding_fundamentals'),
                ],
                [
                    'url' => route('course', ['course' => 'deep-learning']),
                    'key' => 'deep-learning',
                    'image' => asset('deep-learning.png'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_deep_learning'),
                ],
                [
                    'url' => route('course', ['course' => 'blockchain-basics']),
                    'key' => 'blockchain-basics',
                    'image' => asset('blockchain-basics.jpg'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_blockchain_basics'),
                ],
                [
                    'url' => route('course', ['course' => 'smart-contracts']),
                    'key' => 'smart-contracts',
                    'image' => asset('smart-contracts.jpg'),
                    'overlay' => 'green',
                    'title' => trans('courses.title_smart_contracts'),
                ],
                [
                    'url' => route('course', ['course' => 'ethereum-development']),
                    'key' => 'ethereum-development',
                    'image' => asset('eth-development.jpg'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_ethereum_development'),
                ],
                [
                    'url' => route('course', ['course' => 'react']),
                    'key' => 'react',
                    'image' => asset('react.png'),
                    'overlay' => 'red',
                    'title' => trans('courses.title_react'),
                ],
                [
                    'url' => route('course', ['course' => 'vr-development']),
                    'key' => 'vr-development',
                    'image' => asset('vr-development.png'),
                    'overlay' => 'purple',
                    'title' => trans('courses.title_vr_development'),
                ],
                [
                    'url' => route('course', ['course' => 'ai-development']),
                    'key' => 'ai-development',
                    'image' => asset('ai-development.png'),
                    'overlay' => 'yellow',
                    'title' => trans('courses.title_ai_development'),
                ],
                [
                    'url' => route('course', ['course' => 'robotics']),
                    'key' => 'robotics',
                    'image' => asset('robotics.png'),
                    'overlay' => 'cyan',
                    'title' => trans('courses.title_robotics'),
                ],
                [
                    'url' => route('course', ['course' => 'neuro-marketing']),
                    'key' => 'neuro-marketing',
                    'image' => asset('neuro-marketing.png'),
                    'overlay' => 'yellow',
                    'title' => trans('courses.title_neuro_marketing'),
                ],
                [
                    'url' => route('course', ['course' => 'digital-graphics']),
                    'key' => 'digital-graphics',
                    'image' => asset('digital-graphics.png'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_digital_graphics'),
                ],
                [
                    'url' => route('course', ['course' => 'build-website']),
                    'key' => 'build-website',
                    'image' => asset('build-website.jpg'),
                    'overlay' => 'pink',
                    'title' => trans('courses.title_build_website'),
                ],
                [
                    'url' => route('course', ['course' => 'building-apps']),
                    'key' => 'building-apps',
                    'image' => asset('mobile-app.jpg'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_building_apps'),
                ],
                [
                    'url' => route('course', ['course' => 'game-development']),
                    'key' => 'game-development',
                    'image' => asset('game-development.jpg'),
                    'overlay' => 'green',
                    'title' => trans('courses.title_game_development'),
                ],
                [
                    'url' => route('course', ['course' => 'crypto-intro']),
                    'key' => 'crypto-intro',
                    'image' => asset('cryptocurrency.jpg'),
                    'overlay' => 'orange',
                    'title' => trans('courses.title_crypto_intro'),
                ],
                [
                    'url' => route('course', ['course' => 'ethereum-basics']),
                    'key' => 'ethereum-basics',
                    'image' => asset('ethereum-basics.jpg'),
                    'overlay' => 'purple',
                    'title' => trans('courses.title_ethereum_basics'),
                ],
            ];
        });
    }
}
