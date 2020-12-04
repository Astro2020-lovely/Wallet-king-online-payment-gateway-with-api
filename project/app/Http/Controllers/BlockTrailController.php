<?php

namespace App\Http\Controllers;

use App\Classes\GetUserAgents;
use App\Settings;
use App\Transaction;
use App\UserAccount;
use Blocktrail\SDK\BlocktrailSDK;
use Illuminate\Http\Request;
use Blocktrail;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use Session;
use Validator;
use App;
use Config;
use URL;
use Redirect;


class BlockTrailController extends Controller
{
    private $client;

    public function __construct() {
        $btrail = Settings::findOrFail(1);
        $this->client = new BlocktrailSDK($btrail->blocktrail_api, $btrail->blocktrail_secret, "BTC", true /* testnet */);
        //$this->client = new BlocktrailSDK("MY_APIKEY", "MY_APISECRET", "BTC", false /* livenet */);

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
    public function webhook(Request $request)
    {
        $blocksettings = Settings::findOrFail(1);

        $data = json_decode(file_get_contents("php://input"),true);

        $bitTran = $data['data']['hash'];

        $txn = Input::get('secret');

        if (Transaction::where('transid',$txn)->where('status',0)->count() > 0){

            $bitPrice = file_get_contents("https://api.blocktrail.com/v1/btc/price?api_key=".$blocksettings->blocktrail_api);
            $price = json_decode($bitPrice);
            $btc = $price->USD;
            $amount = BlocktrailSDK::toBTC($data['data']['outputs'][0]['value']);

            $deposits = round($amount * $btc,2);

            $chktransaction = Transaction::where('transid',$txn)->where('status',0)->first();

            $data['deposit_transid'] = $bitTran;
            $data['amount'] = $deposits;
            $data['status'] = 1;
            $chktransaction->update($data);

            $account = UserAccount::findOrFail($chktransaction->mainacc->id);
            $data['current_balance'] = $account->current_balance + $deposits;
            $account->update($data);

            $this->client->deleteWebhook('bitHook'.$chktransaction->mainacc->id);

        }
        //session()->forget();
        //return print_r($request);
    }

    public function store(Request $request)
    {
        $blocksettings = Settings::findOrFail(1);
        $bitPrice = file_get_contents("https://api.blocktrail.com/v1/btc/price?api_key=".$blocksettings->blocktrail_api);
        $price = json_decode($bitPrice);
        $btc = $price->USD;

        $amount = round($request->total / $btc,8);

        if ($blocksettings->use_address == 1){
            $address = $blocksettings->wallet_address;
        }else{

            try {
                $wallet = $this->client->initWallet($blocksettings->wallet_id, $blocksettings->wallet_pass);
                $address = $wallet->getNewAddress();
            } catch (\Exception $e) {
                return back()->with('error',"BitCoin Deposit Access failed because: {$e->getMessage()}");
            }

        }

        $randString = new GetUserAgents();
        $transid = strtoupper($randString->goRandomString(4).str_random(3).$randString->goRandomString(4));

        try {
            $this->client->deleteWebhook('bitHook'.$request->acc);
        } catch (\Exception $e) {
            //return "Webhook Delete failed because: ".$e->getMessage();
        }

        $newWebhook = $this->client->setupWebhook('http://00a00147.ngrok.io/walletfinal/btrail/notify?secret='.$transid,
            'bitHook'.$request->acc);

        $this->client->subscribeAddressTransactions('bitHook'.$request->acc,$address, 6);

        $receivertrans = new Transaction();
        $receivertrans['transid'] = $transid;
        $receivertrans['mainacc'] = $request->acc;
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

        session(['address' => $address,'amount' => $amount,'usd' => $request->total,'accountnumber' => $request->acc]);

        return redirect('account/deposit/bitcoin');
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
