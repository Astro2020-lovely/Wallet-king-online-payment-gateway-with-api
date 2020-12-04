<?php

namespace App\Http\Controllers;

use App\Classes\GetUserAgents;
use App\Deposit;
use App\Settings;
use App\Transaction;
use App\UserAccount;
use App\Withdraw;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use Session;
use Validator;
use App;
use Config;
use URL;
use Redirect;


class BlockChainController extends Controller
{

    public function __construct() {
        $this->middleware('auth:profile',['only' => ['deposit','getDepositCount','getDepositData']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payblocktrail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function bitcoindeposit()
    {
        return view('user.btrailpayment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chaincallback()
    {

        $blocksettings = Settings::findOrFail(1);
        $real_secret  = $blocksettings->secret_string;
        //$randString = new GetUserAgents();

        $des = $_SERVER['QUERY_STRING'];

//        $fh = fopen('transDet.txt', 'w');
//        fwrite($fh, $des);
//        fclose($fh);

        $bitTran = $_GET['transaction_hash'];
        $bitAddr = $_GET['address'];

        $trans_id = Input::get('transx_id');
        $getSec = Input::get('secret');
        if ($real_secret == $getSec){

            if (Transaction::where('transid',$trans_id)->where('status',0)->count() > 0){

                $transx = Transaction::where('transid',$trans_id)->where('status',0)->first();
                $useracc = UserAccount::findOrFail($transx->mainacc);

                $deposits = $_GET['value']/100000000;

                $datas['status'] = 1;
                $datas['deposit_transid'] = $bitTran;
                $datas['amount'] = $deposits;
                $transx->update($datas);


                $data['current_balance'] = $useracc->current_balance + $deposits;
                $useracc->update($data);



                //$deposits = round($amount * $btc,2);
                //$transid = strtoupper($randString->goRandomString(4).str_random(3).$randString->goRandomString(4));



    //            $receivertrans = new Transaction();
    //            $receivertrans['transid'] = $transid;
    //            $receivertrans['mainacc'] = $acc;
    //            $receivertrans['accto'] = null;
    //            $receivertrans['accfrom'] = null;
    //            $receivertrans['type'] = "deposit";
    //            $receivertrans['sign'] = "+";
    //            $receivertrans['reference'] = "";
    //            $receivertrans['reason'] = "Deposit";
    //            $receivertrans['amount'] = $deposits;
    //            $receivertrans['fee'] = "0";
    //            $receivertrans['deposit_method'] = "BitCoin";
    //            $receivertrans['deposit_transid'] = $bitTran;
    //            $receivertrans['trans_date'] = date('Y-m-d H:i:s');
    //            //$receivertrans['status'] = 1;
    //            $receivertrans->save();

    //            $newdeposit = new Deposit();
    //            $newdeposit['accid'] = $acc;
    //            $newdeposit['deposit_address'] = $bitAddr;
    //            $newdeposit['amount'] = $deposits;
    //            $newdeposit['deposit_method'] = "BitCoin";
    //            $newdeposit->save();

                //Send Referral Bonus
    //            if (UserAccount::where('id', $useracc->referred_by)->count() > 0){
    //
    //                $refaccount = UserAccount::findOrFail($useracc->referred_by);
    //                $refamount = ($blocksettings->referral_percent / 100) * $deposits;
    //                $datasas['current_balance'] = $refaccount->current_balance + $refamount;
    //
    //                $transids = strtoupper($randString->goRandomString(4).str_random(3).$randString->goRandomString(4));
    //
    //                $receivertrans = new Transaction();
    //                $receivertrans['transid'] = $transids;
    //                $receivertrans['mainacc'] = $useracc->referred_by;
    //                $receivertrans['accto'] = null;
    //                $receivertrans['accfrom'] = $acc;
    //                $receivertrans['type'] = "referral";
    //                $receivertrans['sign'] = "+";
    //                $receivertrans['reference'] = "";
    //                $receivertrans['reason'] = "Referral Bonus";
    //                $receivertrans['amount'] = $refamount;
    //                $receivertrans['fee'] = "0";
    //                $receivertrans['deposit_method'] = "None";
    //                $receivertrans['trans_date'] = date('Y-m-d H:i:s');
    //                $receivertrans['status'] = 1;
    //                $receivertrans->save();
    //
    //                $refaccount->update($datasas);
    //            }

                //session(['deposit_amount' => $deposits,'account' => $acc]);

                return "*ok*";

            }

        }
    }


    function goRandomString($length = 10) {
        $characters = 'abcdefghijklmnpqrstuvwxyz123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }


    public function accept($id)
    {
        $blocksettings = Settings::findOrFail(1);
        $withdraw = Withdraw::findOrFail($id);

        $transid = strtoupper($this->goRandomString(4).str_random(3).$this->goRandomString(4));

        $receivertrans = new Transaction();
        $receivertrans['transid'] = $transid;
        $receivertrans['mainacc'] = $withdraw->acc->id;
        $receivertrans['accto'] = null;
        $receivertrans['accfrom'] = null;
        $receivertrans['type'] = "withdraw";
        $receivertrans['sign'] = "-";
        $receivertrans['reference'] = "Payout Withdraw Successful";
        $receivertrans['reason'] = "Withdraw Payouts";
        $receivertrans['amount'] = $withdraw->amount;
        $receivertrans['fee'] = $withdraw->fee;
        $receivertrans['withdrawid'] = $withdraw->id;
        $receivertrans['trans_date'] = date('Y-m-d H:i:s');
        $receivertrans['status'] = 1;
        $receivertrans->save();

        $data['status'] = "completed";
        $withdraw->update($data);

        return redirect('admin/withdraws')->with('message','Withdraw Accepted Successfully');
    }

    public function store(Request $request)
    {

    }

    public function deposit(Request $request)
    {
        $blocksettings = Settings::findOrFail(1);
        $randString = new GetUserAgents();

        if($request->total > 0){

        $acc = Auth::user()->id;
        $transid = strtoupper($randString->goRandomString(4).str_random(3).$randString->goRandomString(4));

        $amount = file_get_contents('https://blockchain.info/tobtc?currency=USD&value='.$request->total);
        //return $amount;
        $secret = $blocksettings->secret_string;
        $my_xpub = $blocksettings->blockchain_xpub;
        $my_api_key = $blocksettings->blockchain_api;
        //return $my_xpub.'-'.$secret.'-'.$my_api_key;
        $my_callback_url = url('/').'/bitcoin/notify?transx_id='.$transid.'&secret='.$secret;

        $root_url = 'https://api.blockchain.info/v2/receive';

        $parameters = 'xpub=' .$my_xpub. '&callback=' .urlencode($my_callback_url). '&key=' .$my_api_key.'&gap_limit=300';

        $response = file_get_contents($root_url . '?' . $parameters);

        $object = json_decode($response);

        $address = $object->address;

        //session(['address' => $address,'accountnumber' => $acc]);

            $receivertrans = new Transaction();
            $receivertrans['transid'] = $transid;
            $receivertrans['mainacc'] = $acc;
            $receivertrans['accto'] = null;
            $receivertrans['accfrom'] = null;
            $receivertrans['type'] = "deposit";
            $receivertrans['sign'] = "+";
            $receivertrans['reference'] = $request->reference;
            $receivertrans['reason'] = "Account Deposit";
            $receivertrans['amount'] = $request->total;
            $receivertrans['fee'] = "0";
            $receivertrans['deposit_method'] = "BitCoin";
            $receivertrans['trans_date'] = date('Y-m-d H:i:s');
            $receivertrans['status'] = 0;
            $receivertrans->save();

//            $newdeposit = new Deposit();
//            $newdeposit['accid'] = Auth::user()->id;
//            $newdeposit['deposit_method'] = 'BitCoin';
//            $newdeposit['amount'] = $request->total;
//            $newdeposit['bchain_address'] = $address;
//            $newdeposit->save();
//
//            $settings = Settings::findOrFail(1);
//            $to = $settings->email;
//            $subject = "New Bitcoin Deposit Request Received";
//            $txt = "Hello Admin,\nA New Deposit Request Received of Amount ".$settings->currency_sign.$request->total.". Please login to Admin Panel to check.";
//            $headers = "From: ".$settings->title."<".$settings->email.">";
//            mail($to,$subject,$txt,$headers);
//

        session(['address' => $address,'amount' => $amount,'usd' => $request->total,'accountnumber' => $acc]);

        return redirect('account/deposit/bitcoin');

            //return redirect()->back()->with('message','Deposit Request Sent Successfully.');

        }
        return redirect()->back()->with('error','Please enter a valid amount.')->withInput();
        //return view('user.depositmoney');
    }

    public function getDepositCount()
    {
        $deposits = Deposit::where('accid',Auth::user()->id)->where('status','pending')->count();
        return $deposits;
    }

    public function getDepositData()
    {
        $deposits = Deposit::where('accid',Auth::user()->id)->where('status','pending')->orderBy('id','desc')->first();
        $totaldeposits = Deposit::where('accid',Auth::user()->id)->where('status','pending')->count();
        return response()->json([
                'status' => 'success',
                'amount' => $deposits->amount,
                'count' => $totaldeposits,
                'confirms' => 2,
                'message' => '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Successfully Deposited '.$deposits->amount.' BTC</strong></div>'
            ]
            ,200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
