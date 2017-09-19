<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('courses', function ($app) {
            return [
                [
                    'url' => 'https://www.bitdegree.org/learn/web-fundamentals/',
                    'key' => 'web-fundamentals',
                    'image' => '/assets/web-development.png',
                    'overlay' => 'green',
                    'title' => 'Web Development Theory',
                    'description' => 'Available Beta',
                    'isFree' => true,
                ],
                [
                    'url' => route('course', ['course' => 'coding-fundamentals']),
                    'key' => 'coding-fundamentals',
                    'image' => '/assets/coding-fundamentals.png',
                    'overlay' => 'blue',
                    'title' => 'Coding Fundamentals',
                ],
                [
                    'url' => route('course', ['course' => 'deep-learning']),
                    'key' => 'deep-learning',
                    'image' => '/assets/deep-learning.png',
                    'overlay' => 'grey',
                    'title' => 'Deep Learning',
                ],
                [
                    'url' => route('course', ['course' => 'react']),
                    'key' => 'react',
                    'image' => '/assets/react.png',
                    'overlay' => 'red',
                    'title' => 'React',
                ],
                [
                    'url' => route('course', ['course' => 'vr-development']),
                    'key' => 'vr-development',
                    'image' => '/assets/vr-development.png',
                    'overlay' => 'purple',
                    'title' => 'VR Developement',
                ],
                [
                    'url' => route('course', ['course' => 'ai-development']),
                    'key' => 'ai-development',
                    'image' => '/assets/ai-development.png',
                    'overlay' => 'yellow',
                    'title' => 'AI Development',
                ],
                [
                    'url' => route('course', ['course' => 'robotics']),
                    'key' => 'robotics',
                    'image' => '/assets/robotics.png',
                    'overlay' => 'cyan',
                    'title' => 'Robotics',
                ],
                [
                    'url' => route('course', ['course' => 'neuro-marketing']),
                    'key' => 'neuro-marketing',
                    'image' => '/assets/neuro-marketing.png',
                    'overlay' => 'yellow',
                    'title' => 'Neuro Marketing',
                ],
                [
                    'url' => route('course', ['course' => 'digital-graphics']),
                    'key' => 'digital-graphics',
                    'image' => '/assets/digital-graphics.png',
                    'overlay' => 'grey',
                    'title' => 'Digital Graphics',
                ],
                [
                    'url' => route('course', ['course' => 'build-website']),
                    'key' => 'build-website',
                    'image' => '/assets/build-website.jpg',
                    'overlay' => 'pink',
                    'title' => 'Build website from scratch',
                ],
                [
                    'url' => route('course', ['course' => 'building-apps']),
                    'key' => 'building-apps',
                    'image' => '/assets/mobile-app.jpg',
                    'overlay' => 'blue',
                    'title' => 'Building Android Apps',
                ],
                [
                    'url' => route('course', ['course' => 'game-development']),
                    'key' => 'game-development',
                    'image' => '/assets/game-development.jpg',
                    'overlay' => 'green',
                    'title' => '2D Game Development',
                ],
            ];
        });
    }
}
