<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['transid', 'mainacc', 'accto', 'accfrom', 'type', 'sign', 'referance', 'amount','fee', 'reason','deposit_method', 'deposit_transid', 'deposit_chargeid', 'withdrawid', 'trans_date','item_name', 'item_code', 'custom', 'used_api', 'origin', 'status'];
    public $timestamps = false;
    public static $withoutAppends = false;

    public function getAcctoAttribute($accto)
    {
        if(self::$withoutAppends){
            return $accto;
        }

        if (UserAccount::where('id',$accto)->exists()){
            $data = UserAccount::findOrFail($accto);
        }else{
            $data = new \stdClass();
            $data->email = "<span style='color:red;'>Account Deleted</span>";
            $data->name = "<span style='color:red;'>Account Deleted</span>";
            $data->phone = "<span style='color:red;'>Account Deleted</span>";
        }

        return $data;
    }

    public function getAccfromAttribute($accfrom)
    {
        if(self::$withoutAppends){
            return $accfrom;
        }
        if (UserAccount::where('id',$accfrom)->exists()){
            $data = UserAccount::findOrFail($accfrom);
        }else{
            $data = new \stdClass();
            $data->email = "<span style='color:red;'>Account Deleted</span>";
            $data->name = "<span style='color:red;'>Account Deleted</span>";
            $data->phone = "<span style='color:red;'>Account Deleted</span>";
        }

        return $data;
    }

    public function getMainaccAttribute($mainacc)
    {
        if(self::$withoutAppends){
            return $mainacc;
        }
        if (UserAccount::where('id',$mainacc)->exists()){
            $data = UserAccount::findOrFail($mainacc);
        }else{
            $data = new \stdClass();
            $data->email = "<span style='color:red;'>Account Deleted</span>";
            $data->name = "<span style='color:red;'>Account Deleted</span>";
            $data->phone = "<span style='color:red;'>Account Deleted</span>";
        }

        return $data;
    }

    public function getwithdrawidAttribute($withdrawid)
    {
        if(self::$withoutAppends){
            return $withdrawid;
        }
        if ($withdrawid != null){
            $data = Withdraw::findOrFail($withdrawid);
        }else{
            $data = new \stdClass();
            $data->method = "By Admin";
        }

        return $data;
    }


}
