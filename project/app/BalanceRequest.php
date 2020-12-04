<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalanceRequest extends Model
{
    protected $table = "requests";
    protected $fillable = ['accto', 'accfrom', 'amount', 'reference', 'req_date'];
    public $timestamps = false;
    public static $withoutAppends = false;

    public function getAcctoAttribute($accto)
    {
        if(self::$withoutAppends){
            return $accto;
        }
        return UserAccount::findOrFail($accto);
    }

    public function getAccfromAttribute($accfrom)
    {
        if(self::$withoutAppends){
            return $accfrom;
        }
        return UserAccount::findOrFail($accfrom);
    }
}
