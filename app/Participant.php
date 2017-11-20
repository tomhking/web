<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Participant extends Model
{
    protected $hidden = [
        'password',
        'confirmation_key',
        'ip',
    ];

    protected $casts = [
        'email_verified' => 'bool',
        'captcha_verified' => 'bool',
    ];

    public function authTokens()
    {
        return $this->hasMany(AuthToken::class);
    }

    public function isProfileFull() {
        return
            !empty($this->first_name) &&
            !empty($this->last_name) &&
            !empty($this->country) &&
            !empty($this->birthday);
    }

    static public function getCurrent() {
        /** @var  $request Request */
        $request = app('request');
        $authKey = $request->cookie('auth');

        if(empty($authKey)) {
            return null;
        }

        $token = AuthToken::byKey($authKey)->first();

        if ($token instanceof AuthToken && $token->canAuthenticate() && $token->participant instanceof Participant) {
            return $token->participant;
        }

        return null;
    }
}
