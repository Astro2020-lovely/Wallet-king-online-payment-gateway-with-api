<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccount extends Authenticatable
{
    use Notifiable;
    public $table = "user_profiles";
    protected $fillable = [
        'name','country','zip','dob','acctype','api_key','current_balance', 'gender', 'email', 'phone', 'password', 'fax', 'address', 'city', 'zip', 'verification_token', 'email_verified', 'status',  'account_status', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

}
