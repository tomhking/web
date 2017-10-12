<?php

namespace App\Providers;

use App\Events\FreeTokenSignup;
use App\Events\LogIn;
use App\Listeners\MailListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        FreeTokenSignup::class => [
            MailListener::class,
        ],
        LogIn::class => [
            MailListener::class,
        ],
    ];

}
