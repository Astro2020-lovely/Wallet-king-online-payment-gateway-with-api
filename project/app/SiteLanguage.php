<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteLanguage extends Model
{
    protected $table = "site_language";
    protected $fillable = ['home', 'api_documentation', 'about_us', 'contact_us', 'faq', 'log_in','next', 'sign_up','personal','business','personal_details','business_details', 'my_account', 'current_balance', 'recent_transaction', 'dates', 'action', 'amount', 'send', 'deposit', 'withdraw', 'request', 'settings', 'transactions', 'account_settings', 'security_settings', 'api_details', 'update_info', 'pending_withdraws', 'pending_requests', 'total', 'subscription', 'subscribe', 'address', 'contact_us_today', 'street_address', 'phone', 'email', 'fax', 'submit', 'name', 'dashboard', 'update_profile', 'change_password', 'latest_blogs', 'footer_links', 'view_details', 'blog', 'share_in_social', 'support_center', 'pending_deposits', 'notification', 'logout'];
    public $timestamps = false;
}
