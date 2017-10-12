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

    public function authTokens()
    {
        return $this->hasMany(AuthToken::class);
    }
}
