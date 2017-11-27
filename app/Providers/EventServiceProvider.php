<?php

namespace App\Providers;

use App\Events\FreeTokenSignup;
use App\Events\LogIn;
use App\Listeners\MailListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
