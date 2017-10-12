<?php

namespace App\Listeners;

use App\Contracts\Mailable;
use App\Library\Mailer;
use Illuminate\Contracts\Events\Dispatcher;
use Mailer\Formatters\Events;
use Mailer\Notification;

class MailListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the outgoing mail
     * @param Mailable $event
     */
    public function handle(Mailable $event)
    {
        /** @var Mailer $mailer */
        $mailer = app(Mailer::class);


        $notificationService = new Notification();
        $notificationService->setSource('bitdegree.org');
        $notificationService->setFormatter(new Events());

        $mailer->setService($notificationService);

        // Send the mail
        $mailer->send($event->getMessage());
    }
}
