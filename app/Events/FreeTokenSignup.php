<?php

namespace App\Events;

use App\AuthToken;
use App\Contracts\Mailable;
use App\Participant;
use Mailer\Messages\Simple;

class FreeTokenSignup extends Event implements Mailable
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
     * @param null $platform
     */
    public function __construct(Participant $participant, AuthToken $authToken, $language = 'en', $platform = null)
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
        $message->setEvent('participant_signup'.$this->getLanguageSuffix($this->language));
        $message->setClientId($this->participant->id);
        $message->setEmail($this->participant->email);
        $message->setFirstName($this->participant->first_name);
        $message->setLastName($this->participant->last_name);
        $message->setExtras([
            'wallet' => $this->participant->wallet,
            'login_url' => route('auth', [
                'lang' => $this->language,
                'participant' => $this->participant->id,
                'token' => $this->authToken->key,
                'destination' => $this->platform,
            ]),
            'free_tokens' => true,
        ]);

        return $message;
    }
}
