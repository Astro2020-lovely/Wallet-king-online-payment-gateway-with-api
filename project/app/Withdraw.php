<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = ['acc', 'method', 'acc_email', 'iban', 'country', 'acc_name', 'address', 'swift', 'reference', 'amount', 'fee', 'created_at', 'updated_at', 'status'];

    public static $withoutAppends = false;

    public function getAccAttribute($acc)
    {
        if(self::$withoutAppends){
            return $acc;
        }
        return UserAccount::findOrFail($acc);
    }
}
