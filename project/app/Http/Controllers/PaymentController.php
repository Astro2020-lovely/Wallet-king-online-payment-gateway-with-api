<?php

namespace App\Http\Controllers;

use App\Classes\GetUserAgents;
use App\Order;
use App\PricingTable;
use App\Settings;
use App\Transaction;
use App\UserAccount;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    function goRandomString($length = 10) {
        $characters = 'abcdefghijklmnpqrstuvwxyz123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }

 public function store(Request $request){

         if($request->total > 0){

         $settings = Settings::findOrFail(1);


         $paypal_email = $settings->paypal_business;
         $return_url = action('PaymentController@payreturn');
         $cancel_url = action('PaymentController@paycancle');
         $notify_url = action('PaymentController@notify');

         $item_name = $settings->title." Deposit Amount";
         $transid = strtoupper($this->goRandomString(4).str_random(3).$this->goRandomString(4));
         ;
         $item_amount = $request->total;

         $querystring = '';

         // Firstly Append paypal account to querystring
         $querystring .= "?business=".urlencode($paypal_email)."&";

         // Append amount& currency (£) to quersytring so it cannot be edited in html

         //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
         $querystring .= "item_name=".urlencode($item_name)."&";
         $querystring .= "amount=".urlencode($item_amount)."&";
         $querystring .= "item_number=".urlencode($transid)."&";

        $querystring .= "cmd=".urlencode(stripslashes($request->cmd))."&";
        $querystring .= "bn=".urlencode(stripslashes($request->bn))."&";
        $querystring .= "lc=".urlencode(stripslashes($request->lc))."&";
        $querystring .= "currency_code=".urlencode(stripslashes($request->currency_code))."&";

         // Append paypal return addresses
         $querystring .= "return=".urlencode(stripslashes($return_url))."&";
         $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
         $querystring .= "notify_url=".urlencode($notify_url)."&";

         $querystring .= "custom=".$request->acc;

         $receivertrans = new Transaction();
         $receivertrans['transid'] = $transid;
         $receivertrans['mainacc'] = $request->acc;
         $receivertrans['accto'] = null;
         $receivertrans['accfrom'] = null;
         $receivertrans['type'] = "deposit";
         $receivertrans['sign'] = "+";
         $receivertrans['reference'] = $request->reference;
         $receivertrans['reason'] = "Account Deposit";
         $receivertrans['amount'] = $item_amount;
         $receivertrans['fee'] = "0";
         $receivertrans['deposit_method'] = "Paypal";
         $receivertrans['trans_date'] = date('Y-m-d H:i:s');
         $receivertrans->save();

         // Redirect to paypal IPN
         header('location:https://www.paypal.com/cgi-bin/webscr'.$querystring);
         exit();

     }else{
         return back()->with('error', 'Please Enter Valid Amount.');
     }
 }

 public function paycancle(){
     return redirect()->back()->with('error', 'Deposit Canceled.');
 }

public function payreturn(){
     return view('user.payreturn');
 }

public function nopayreturn(){
     return view('user.nopayreturn');
 }

public function perfect_notify(Request $request){

    header('Access-Control-Allow-Origin: https://perfectmoney.is');
    header('Access-Control-Allow-Methods: GET, POST');
    header('Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, Application');

    if ($request->has('PAYMENT_ID') && $request->has('CUST_NUM')){

        $randString = new GetUserAgents();
        $transid = strtoupper($randString->goRandomString(4).str_random(3).$randString->goRandomString(4));

        $receivertrans = new Transaction();
        $receivertrans['transid'] = $transid;
        $receivertrans['mainacc'] = $request->CUST_NUM;
        $receivertrans['accto'] = null;
        $receivertrans['accfrom'] = null;
        $receivertrans['type'] = "deposit";
        $receivertrans['sign'] = "+";
        $receivertrans['reference'] = "Account Deposit With Perfectmoney";
        $receivertrans['reason'] = "Account Deposit";
        $receivertrans['amount'] = $request->PAYMENT_AMOUNT;
        $receivertrans['fee'] = "0";
        $receivertrans['deposit_method'] = "PerfectMoney";
        $receivertrans['deposit_transid'] = $request->PAYMENT_ID;
        $receivertrans['trans_date'] = date('Y-m-d H:i:s');
        $receivertrans['status'] = 1;
        $receivertrans->save();

        $account = UserAccount::findOrFail($request->CUST_NUM);
        $data['current_balance'] = $account->current_balance + $request->PAYMENT_AMOUNT;
        $account->update($data);
    }

}


public function notify(Request $request){

    $raw_post_data = file_get_contents('php://input');
    $raw_post_array = explode('&', $raw_post_data);
    $myPost = array();
    foreach ($raw_post_array as $keyval) {
        $keyval = explode ('=', $keyval);
        if (count($keyval) == 2)
            $myPost[$keyval[0]] = urldecode($keyval[1]);
    }

    // Read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    if(function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exists = true;
    }
    foreach ($myPost as $key => $value) {
        if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
            $value = urlencode(stripslashes($value));
        } else {
            $value = urlencode($value);
        }
        $req .= "&$key=$value";
    }

    /*
     * Post IPN data back to PayPal to validate the IPN data is genuine
     * Without this step anyone can fake IPN data
     */
    $paypalURL = "https://www.paypal.com/cgi-bin/webscr";
    $ch = curl_init($paypalURL);
    if ($ch == FALSE) {
        return FALSE;
    }
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

// Set TCP timeout to 30 seconds
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
    $res = curl_exec($ch);

    /*
     * Inspect IPN validation result and act accordingly
     * Split response headers and payload, a better way for strcmp
     */
    $tokens = explode("\r\n\r\n", trim($res));
    $res = trim(end($tokens));
    if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {

        $chktransaction = Transaction::where('mainacc',$_POST['custom'])
            ->where('transid',$_POST['item_number']);
        $data['status'] = 1;
        $data['deposit_transid'] = $_POST['txn_id'];
        $chktransaction->update($data);

        $account = UserAccount::findOrFail($_POST['custom']);
        $data['current_balance'] = $account->current_balance + $_POST['mc_gross'];
        $account->update($data);

    }else{

        $fh = fopen('newresag.txt', 'w');
        fwrite($fh, $req);
        fclose($fh);
    }

}



}
