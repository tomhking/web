<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Participant extends Model
{
    protected $hidden = [
        'password',
    ];


    public function authTokens()
    {
        return $this->hasMany(AuthToken::class);
    }

    public function referrals() {
        return $this->hasMany(Participant::class, 'affiliate_id');
    }

    public function affiliate() {
        return $this->belongsTo(Participant::class, 'affiliate_id');
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
