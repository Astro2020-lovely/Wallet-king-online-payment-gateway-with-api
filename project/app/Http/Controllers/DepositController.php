<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Settings;
use App\Transaction;
use App\UserAccount;
use Illuminate\Http\Request;

class DepositController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::where('status','pending')->orderBy('id','desc')->get();
        return view('admin.deposits',compact('deposits'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deposit = Deposit::findOrFail($id);
        return view('admin.depositdetails',compact('deposit'));
    }

    public function accept($id)
    {
        $deposit = Deposit::findOrFail($id);

        $transid = strtoupper($this->goRandomString(4).str_random(3).$this->goRandomString(4));
        ;

        $receivertrans = new Transaction();
        $receivertrans['transid'] = $transid;
        $receivertrans['mainacc'] = $deposit->accid->id;
        $receivertrans['accto'] = null;
        $receivertrans['accfrom'] = null;
        $receivertrans['type'] = "deposit";
        $receivertrans['sign'] = "+";
        $receivertrans['deposit_method'] = $deposit->deposit_method;
        if ($deposit->deposit_method == "Bank"){
            $receivertrans['deposit_transid'] = $deposit->bank_information;
        }elseif ($deposit->deposit_method == "BitCoin"){
            $receivertrans['deposit_transid'] = $deposit->bchain_address;
        }else{
            $receivertrans['deposit_transid'] = $deposit->mobile_information;
        }
        $receivertrans['reference'] = "Account Deposited By BitCoin";
        $receivertrans['reason'] = "Account Deposit";
        $receivertrans['amount'] = $deposit->amount;
        $receivertrans['withdrawid'] = $deposit->id;
        $receivertrans['trans_date'] = date('Y-m-d H:i:s');
        $receivertrans['status'] = 1;
        $receivertrans->save();

        $data['status'] = "completed";
        $deposit->update($data);

        $account = UserAccount::findOrFail($deposit->accid->id);
        $data['current_balance'] = $account->current_balance + $deposit->amount;
        $account->update($data);


        $settings = Settings::findOrFail(1);
        $to = $account->email;
        $subject = "Account Deposit Accepted";
        $txt = "Hello ".$account->name.",\nYour Deposit Request of ".$settings->currency_sign.$deposit->amount." Accepted Successfully. Please login to your Account to check.";
        $headers = "From: ".$settings->title."<".$settings->email.">";
        mail($to,$subject,$txt,$headers);

        return redirect('admin/deposits')->with('message','Deposit Request Accepted Successfully');
    }

    public function reject($id)
    {
        $deposit = Deposit::findOrFail($id);

        $data['status'] = "rejected";
        $deposit->update($data);
        return redirect('admin/deposits')->with('message','Deposit Request Rejected Successfully');
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
