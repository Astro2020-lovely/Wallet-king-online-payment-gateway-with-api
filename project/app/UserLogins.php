<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLogins extends Model
{
    public $table = "user_logins";
    protected $fillable = [
        'userid', 'login_time', 'agent','location', 'ip', 'os', 'status'
    ];
    public $timestamps = false;
    protected $dates = [
        'login_time'
    ];

    public static function lastLogin($userid)
    {
        if (UserLogins::where('userid', $userid)->count() > 0){
            $data = UserLogins::where('userid', $userid)->orderBy('id', 'desc')->first();
        }else{
            $data = new \stdClass();
            $data->ip = "";
            $data->agent = "";
            $data->os = "";
            $data->login_time = "No Login Yet";
        }
        return $data;
    }



}
