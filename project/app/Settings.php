<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $table = "settings";
    protected $fillable = ['logo', 'favicon', 'title', 'url', 'about', 'address', 'phone', 'fax', 'email', 'footer', 'background', 'transfer_charge', 'extra_charge', 'withdraw_fee', 'paypal_business', 'stripe_key', 'stripe_secret','blocktrail_api', 'blocktrail_secret', 'wallet_id', 'wallet_pass', 'use_address', 'wallet_address', 'blocktrail_deposit', 'blocktrail_withdraw', 'currency_code', 'currency_sign','theme_color', 'css_file', 'paypal_deposit', 'stripe_deposit','bank_deposit', 'mobile_deposit', 'bank_info', 'mobile_info', 'paypal_withdraw', 'skrill_withdraw', 'payoneer_withdraw', 'bank_withdraw','secret_string', 'blockchain_xpub', 'blockchain_api'];
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
}
