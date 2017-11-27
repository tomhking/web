<?php

namespace App\Providers;

use App\Library\Mailer;
use App\User;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use ReCaptcha\ReCaptcha;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Trust CloudFare IP ranges - https://www.cloudflare.com/ips/
        \Symfony\Component\HttpFoundation\Request::setTrustedProxies([
            '103.21.244.0/22',
            '103.22.200.0/22',
            '103.31.4.0/22',
            '104.16.0.0/12',
            '108.162.192.0/18',
            '131.0.72.0/22',
            '141.101.64.0/18',
            '162.158.0.0/15',
            '172.64.0.0/13',
            '173.245.48.0/20',
            '188.114.96.0/20',
            '190.93.240.0/20',
            '197.234.240.0/22',
            '198.41.128.0/1',
            '2400:cb00::/32',
            '2405:8100::/32',
            '2405:b500::/32',
            '2606:4700::/32',
            '2803:f800::/32',
            '2c0f:f248::/32',
            '2a06:98c0::/29',
        ]);

        Validator::extend('validCountry', function ($attribute, $value, $parameters) {
            $countries = app()->make('countries');
            return isset($countries[$value]);
        });

        Validator::extend('recaptcha', function ($attribute, $value, $parameters) {
            $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET'));
            return $recaptcha->verify($value, app('request')->ip())->isSuccess();
        });

        Validator::extend('platform', function ($attribute, $value, $parameters) {
            return isset(config('platforms')[$value]);
        });

        User::creating(function (User $self) {
            /** @var Request $request */
            $request = app()->make('request');
            $affiliateID = (int) $request->cookie('bd-aff', 0);

            if($affiliateID > 0 && User::find($affiliateID)->exists()) {
                $self->affiliate_id = $affiliateID;
            }
        });


        // Set the current language
        $languages = app()->make('languages');
        $languageFromSegment = request()->segment(1, 'en');
        config()->set('app.locale', isset($languages[$languageFromSegment]) ? $languageFromSegment : config('app.fallback_locale'));
        view()->share([
            'languages' => $languages,
            'currentLanguage' => config('app.locale'),
            'defaultLanguage' => config('app.fallback_locale'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('geoip', function() {
            return new Reader(resource_path('geoip.mmdb'));
        });

        $this->app->singleton('countries', function(){
            return json_decode(file_get_contents(base_path('vendor/umpirsky/country-list/data/en_US/country.json')), true);
        });

        $this->app->singleton('amqp.connection', function () {
            $amqpConnection = new AMQPStreamConnection(
                env('AMQP_HOST'),
                env('AMQP_PORT'),
                env('AMQP_USER'),
                env('AMQP_PASSWORD'),
                env('AMQP_VHOST')
            );

            if (!empty(env('AMQP_EXCHANGE'))) {
                $amqpConnection->channel()->exchange_declare(env('AMQP_EXCHANGE'), 'topic', false, true, false);
            }
            return $amqpConnection;
        });

        $this->app->bind(Mailer::class, function () {
            $mailer = new Mailer();

            if (env('APP_ENV', 'production') != 'local') {
                $mailer->setConnection(app('amqp.connection'));
                $mailer->setExchange(env('AMQP_EXCHANGE'));
            }

            return $mailer;
        });

        $this->app->singleton('languages', function() {
            return [
                'en' => 'EN',
                'cn' => 'CN',
                'ru' => 'RU',
                'lv' => 'LV',
                'ro' => 'RO',
                'tr' => 'TR',
                'fr' => 'FR',
                'vn' => 'VN',
                'es' => 'ES',
                'id' => 'ID',
                'gr' => 'GR',
                'it' => 'IT',
                'nl' => 'NL',
                'pt' => 'PT',
                'hr' => 'HR',
                'ae' => 'AE',
                'ee' => 'EE',
                'th' => 'TH',
                'hu' => 'HU',
                'kr' => 'KR',
            ];
        });

        $this->app->singleton('mailableLanguages', function () {
            return [
                'en',
                'nl',
                'ee',
                'ae',
                'ru',
                'lv',
                'hr',
                'gr',
                'pt',
                'th',
                'it',
                'ro',
                'tr',
                'fr',
                'vn',
                'es',
                'id',
                'hu',
            ];
        });

        $this->app->singleton('courses', function ($app) {
            return [
                [
                    'url' => route('course', ['course' => 'smart-contracts']),
                    'key' => 'smart-contracts',
                    'image' => asset_rev('smart-contracts.jpg'),
                    'sponsor' => asset_rev('nexchange.png'),
                    'overlay' => 'purple available',
                    'description' => 'CLASSROOM OPENS: February, 2018',
                    'title' => trans('courses.title_smart_contracts'),
                    'isMvp' => true,
                    'isNew' => true,
                ],
                [
                    'url' => 'https://www.bitdegree.org/learn/web-fundamentals/',
                    'key' => 'web-fundamentals',
                    'image' => asset_rev('web-development.png'),
                    'overlay' => 'green available',
                    'title' => trans('courses.title_web_fundamentals'),
                    'description' => 'Available Beta',
                    'isFree' => true,
                    'isBeta' => true,
                ],
                [
                    'url' => route('course', ['course' => 'full-stack-web-developer']),
                    'key' => 'full-stack-web-developer',
                    'image' => asset_rev('coding-fundamentals.png'),
                    'overlay' => 'blue',
                    'description' => 'CLASSROOM OPENS: January, 2018',
                    'title' => trans('courses.title_coding_fundamentals'),
                    'isNew' => true,
                ],
                [
                    'url' => route('course', ['course' => 'zcoin-protocol']),
                    'key' => 'zcoin-protocol',
                    'image' => asset_rev('zcoin-protocol.jpg'),
                    'sponsor' => asset_rev('zcoin.png'),
                    'overlay' => 'pink',
                    'title' => trans('courses.title_zcoin_protocol'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'ai-development']),
                    'key' => 'ai-development',
                    'image' => asset_rev('ai-development.png'),
                    'sponsor' => asset_rev('singularitynet.png'),
                    'overlay' => 'yellow',
                    'title' => trans('courses.title_ai_development'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'deep-learning']),
                    'key' => 'deep-learning',
                    'image' => asset_rev('deep-learning.png'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_deep_learning'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'blockchain-basics']),
                    'key' => 'blockchain-basics',
                    'image' => asset_rev('blockchain-basics.jpg'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_blockchain_basics'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'ethereum-development']),
                    'key' => 'ethereum-development',
                    'image' => asset_rev('eth-development.jpg'),
                    'overlay' => 'purple',
                    'title' => trans('courses.title_ethereum_development'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'react']),
                    'key' => 'react',
                    'image' => asset_rev('react.png'),
                    'overlay' => 'green',
                    'title' => trans('courses.title_react'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'vr-development']),
                    'key' => 'vr-development',
                    'image' => asset_rev('vr-development.png'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_vr_development'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'robotics']),
                    'key' => 'robotics',
                    'image' => asset_rev('robotics.png'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_robotics'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'neuro-marketing']),
                    'key' => 'neuro-marketing',
                    'image' => asset_rev('neuro-marketing.png'),
                    'overlay' => 'pink',
                    'title' => trans('courses.title_neuro_marketing'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'digital-graphics']),
                    'key' => 'digital-graphics',
                    'image' => asset_rev('digital-graphics.png'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_digital_graphics'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'build-website']),
                    'key' => 'build-website',
                    'image' => asset_rev('build-website.jpg'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_build_website'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'building-apps']),
                    'key' => 'building-apps',
                    'image' => asset_rev('mobile-app.jpg'),
                    'overlay' => 'yellow',
                    'title' => trans('courses.title_building_apps'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'game-development']),
                    'key' => 'game-development',
                    'image' => asset_rev('game-development.jpg'),
                    'overlay' => 'green',
                    'title' => trans('courses.title_game_development'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'crypto-intro']),
                    'key' => 'crypto-intro',
                    'image' => asset_rev('cryptocurrency.jpg'),
                    'overlay' => 'yellow',
                    'title' => trans('courses.title_crypto_intro'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'ethereum-basics']),
                    'key' => 'ethereum-basics',
                    'image' => asset_rev('ethereum-basics.jpg'),
                    'overlay' => 'purple',
                    'title' => trans('courses.title_ethereum_basics'),
                    'isSoon' => true,
                ],

            ];
        });
    }
}
