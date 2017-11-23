<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function referrals() {
        return $this->hasMany(Participant::class, 'affiliate_id');
    }

    public function affiliate() {
        return $this->belongsTo(Participant::class, 'affiliate_id');
    }
}
