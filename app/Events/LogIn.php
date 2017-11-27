<?php

namespace App\Events;

use App\AuthToken;
use App\Contracts\Mailable;
use App\Participant;
use Mailer\Messages\Simple;

class LogIn extends Event implements Mailable
{
    private $participant;
    private $authToken;
    private $language;
    private $platform;

    /**
     * Create a new event instance.
     *
     * @param Participant $participant
     * @param AuthToken $authToken
     * @param string $language
     * @param bool|string $platform
     */
    public function __construct(Participant $participant, AuthToken $authToken, $language = 'en', $platform = false)
    {
        $this->participant = $participant;
        $this->authToken = $authToken;
        $this->language = $language;
        $this->platform = $platform;
    }

    /**
     * Returns the message that is to be mailed
     * @return \Mailer\Contract\Messageable
     */
    public function getMessage(): \Mailer\Contract\Messageable
    {
        $message = new Simple();
        $message->setEvent('participant_login'.$this->getLanguageSuffix($this->language));
        $message->setFirstName($this->participant->first_name);
        $message->setLastName($this->participant->last_name);
        $message->setClientId($this->participant->id);
        $message->setEmail($this->participant->email);
        $message->setExtras([
            'login_url' => route('auth', [
                'lang' => $this->language,
                'participant' => $this->participant->id,
                'token' => $this->authToken->key,
                'destination' => $this->platform,
            ]),
        ]);

        return $message;
    }
}
