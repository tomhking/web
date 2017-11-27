<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'confirmation_key',
        'ip',
    ];

    protected $casts = [
        'email_verified' => 'bool',
        'captcha_verified' => 'bool',
    ];

    public function referrals() {
        return $this->hasMany(User::class, 'affiliate_id');
    }

    public function affiliate() {
        return $this->belongsTo(User::class, 'affiliate_id');
    }

    public function isProfileFull() {
        return
            !empty($this->first_name) &&
            !empty($this->last_name) &&
            !empty($this->country) &&
            !empty($this->birthday);
    }
}
