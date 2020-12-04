<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = ['accid', 'deposit_method', 'bchain_address', 'bank_information', 'mobile_information','created_at', 'updated_at', 'status'];

    public static $withoutAppends = false;

    public function getAccidAttribute($accid)
    {
        if(self::$withoutAppends){
            return $accid;
        }
        return UserAccount::findOrFail($accid);
    }
}
