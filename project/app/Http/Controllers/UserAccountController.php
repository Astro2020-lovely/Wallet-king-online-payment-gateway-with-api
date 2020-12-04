<?php

namespace App\Http\Controllers;

use App\Country;
use App\Deposit;
use App\Settings;
use App\SupportTicket;
use App\Transaction;
use App\UserAccount;
use App\BalanceRequest;
use App\Withdraw;
use function GuzzleHttp\Promise\exception_for;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:profile',['except' => 'email_verify']);
        //$this->middleware('is.business', ['only' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = UserAccount::findOrFail(Auth::user()->id);
        $transactions = Transaction::where('mainacc',Auth::user()->id)->where('status',1)->orderBy('id','desc')->take(8)->get();
        $requests = BalanceRequest::where('accto',Auth::user()->id)->get();
        $deposits = Deposit::where('accid',Auth::user()->id)->where('status','pending')->get();
        $withdraws = Withdraw::where('acc',Auth::user()->id)->where('status','pending')->get();
        $atickets = SupportTicket::where('userid',Auth::user()->id)->where('by_admin',1)->get();
        return view('user.dashboard',compact('user','transactions','requests','withdraws','deposits','atickets'));
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

    public function email_verify()
    {
        $status = "failed";
        $msg = "Invalid Verification Request, Please try again.";
        $token = Input::get('token');
        if ($token == ""){
            return view('verifymail',compact('status','msg'));
        }
        $verifyacc = UserAccount::where('verification_token',$token)->first();
        if (UserAccount::where('verification_token',$token)->count() == 1){
            if ($verifyacc->email_verified != 'yes'){
                $data['email_verified'] = 'yes';
                $verifyacc->update($data);
                $status = "success";
                $msg = "Your Account Verified Successfully.";
                return view('verifymail',compact('status','msg'));
            }else{
                $status = "success";
                $msg = "Your Account is already Verified.";
                return view('verifymail',compact('status','msg'));
            }
        }else{
            $status = "failed";
            $msg = "Invalid Verification Token, Please try again.";
            return view('verifymail',compact('status','msg'));
        }
    }

    public function resend_verify()
    {
        $settings = Settings::findOrFail(1);
        $verifyacc = UserAccount::findOrFail(Auth::guard('profile')->user()->id);
        $verify_token = md5($verifyacc->email.str_random(3));

        $data['verification_token'] = $verify_token;
        $verifyacc->update($data);

        $to = $verifyacc->email;
        $subject = "Email Verification";
        $txt = "Hello ".$verifyacc->name.",\nYour account successfully created. Please go to following link to verify your account email.\n".url('/account/verify?token='.$verify_token);
        $headers = "From: ".$settings->title."<".$settings->email.">";
        mail($to,$subject,$txt,$headers);

        return response()->json([
                'status' => 'success'
            ]
            ,200);
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

    public function reqdetails($id)
    {
        $request = BalanceRequest::where('id',$id)->first();
        return '<table class="table">
                        <tbody>
                        <tr>
                            <td class="whatis">Request Amount:</td>
                            <td>$'.$request->amount.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Name:</td>
                            <td>'.$request->accfrom->name.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Email:</td>
                            <td>'.$request->accfrom->email.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Reference:</td>
                            <td>'.$request->reference.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Request Date:</td>
                            <td>'.$request->req_date.'</td>
                        </tr>
                        </tbody>
                    </table>';
    }

    public function transdetail($id)
    {
        $transaction = Transaction::findOrFail($id);
        $total = $transaction->amount + $transaction->fee;
        $details = '<table class="table" style="table-layout:fixed;">
                        <tbody>
                        <tr>
                            <td class="whatis">Transection ID#</td>
                            <td>'.$transaction->transid.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Transection Action</td>
                            <td>'.$transaction->reason.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">'.$transaction->reason.' Amount:</td>
                            <td>$'.$transaction->amount.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Fee:</td>
                            <td>$'.$transaction->fee.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Total:</td>
                            <td>$'.$total.'</td>
                        </tr>';
                    if ($transaction->type == "credit"){
                        $details .= '<tr>
                            <td class="whatis">From:</td>
                            <td>'.$transaction->accfrom->email.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Name:</td>
                            <td>'.$transaction->accfrom->name.'</td>
                        </tr>';
                    }elseif ($transaction->type == "debit"){
                        $details .= '<tr>
                            <td class="whatis">To:</td>
                            <td>'.$transaction->accfrom->email.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Name:</td>
                            <td>'.$transaction->accfrom->name.'</td>
                        </tr>';
                    }elseif ($transaction->type == "withdraw"){
                        $details .= '<tr>
                            <td class="whatis">Withdraw Method:</td>
                            <td>'.$transaction->withdrawid->method.'</td>
                        </tr>';
                        if ($transaction->withdrawid->method != "By Admin") {
                        $details .= '<tr>
                            <td class="whatis">' . $transaction->withdrawid->method . ' Account:</td>
                            <td>' . ($transaction->withdrawid->method == "Bank" ? $transaction->withdrawid->iban : $transaction->withdrawid->acc_email) . '</td>
                        </tr>';
                        }
                    }elseif ($transaction->type == "deposit"){
                        $details .= '<tr>
                            <td class="whatis">Deposit Method:</td>
                            <td>'.$transaction->deposit_method.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">'.$transaction->deposit_method.' Transaction ID:</td>
                            <td style="word-wrap: break-word;">'.$transaction->deposit_transid.'</td>
                        </tr>';
                        if($transaction->deposit_method == "Stripe")
                            $details .= '<tr>
                            <td class="whatis">'.$transaction->deposit_method.' Charge ID:</td>
                            <td>'.$transaction->deposit_chargeid.'</td>
                        </tr>';
                    }

                $details .= '<tr>
                            <td class="whatis">Reference:</td>
                            <td>'.$transaction->reference.'</td>
                        </tr>
                        <tr>
                            <td class="whatis">Transaction Date:</td>
                            <td>'.date('d F Y h:i:sa',strtotime($transaction->trans_date)).'</td>
                        </tr>
                        </tbody>
                    </table>';

        return $details;
    }


    public function pendingreqs()
    {
        $user = UserAccount::findOrFail(Auth::user()->id);
        $requests = BalanceRequest::where('accto',Auth::user()->id)->get();
        return view('user.requests',compact('user','requests'));
    }

    public function pendingwithdraws()
    {
        $user = UserAccount::findOrFail(Auth::user()->id);
        $withdraws = Withdraw::where('acc',Auth::user()->id)->where('status','pending')->get();
        return view('user.withdraws',compact('user','withdraws'));
    }

    public function pendingdeposits()
    {
        $user = UserAccount::findOrFail(Auth::user()->id);
        $deposits = Deposit::where('accid',Auth::user()->id)->where('status','pending')->get();
        return view('user.pendingdeposits',compact('user','deposits'));
    }

    public function acceptrequest(Request $request,$id)
    {
        $req = BalanceRequest::findOrFail($id);
        $to = UserAccount::where('email',$req->accfrom->email);
        $from = UserAccount::findOrFail(Auth::user()->id);
        if ($to->exists()){
            $transcharge = Settings::findOrFail(1);
            $charge = $transcharge->transfer_charge;
            $extra = $transcharge->extra_charge;
            $charge_total = ($extra / 100) * $req->amount + $charge;
            $charge_final = number_format((float)$charge_total,2,'.','');

            $amount = $req->amount + $charge_total;
            $amount = number_format((float)$amount,2,'.','');

            if ($from->current_balance >= $amount){

                $transid = strtoupper($this->goRandomString(4).str_random(3).$this->goRandomString(4));

                $balance1['current_balance'] = $from->current_balance - $amount;
                $from->update($balance1);

                $toacc = $to->first();
                $balance2['current_balance'] = $toacc->current_balance + $req->amount;
                $toacc->update($balance2);

                $sendertrans = new Transaction();
                $sendertrans['transid'] = $transid;
                $sendertrans['mainacc'] = Auth::user()->id;
                $sendertrans['accto'] = $toacc->id;
                $sendertrans['accfrom'] = Auth::user()->id;
                $sendertrans['type'] = "debit";
                $sendertrans['sign'] = "-";
                $sendertrans['reference'] = $request->reference;
                $sendertrans['reason'] = "Payment Sent";
                $sendertrans['amount'] = $req->amount;
                $sendertrans['fee'] = $charge_final;
                $sendertrans['reference'] = $request->reference;
                $sendertrans['trans_date'] = date('Y-m-d H:i:s');
                $sendertrans['status'] = 1;
                $sendertrans->save();


                $receivertrans = new Transaction();
                $receivertrans['transid'] = $transid;
                $receivertrans['mainacc'] = $toacc->id;
                $receivertrans['accto'] = $toacc->id;
                $receivertrans['accfrom'] = Auth::user()->id;
                $receivertrans['type'] = "credit";
                $receivertrans['sign'] = "+";
                $receivertrans['reference'] = $request->reference;
                $receivertrans['reason'] = "Payment Received";
                $receivertrans['amount'] = $req->amount;
                $receivertrans['fee'] = "0";
                $receivertrans['reference'] = $request->reference;
                $receivertrans['trans_date'] = date('Y-m-d H:i:s');
                $receivertrans['status'] = 1;
                $receivertrans->save();

                $req->delete();

                return redirect()->back()->with('message','Request Accepted Successfully.');

            }else{
                return redirect()->back()->with('error','Insufficient Balance.')->withInput();
            }
        }
        return redirect()->back()->with('error','No Sender Account Found With this email.')->withInput();
    }


    public function rejectrequest($id)
    {
        $req = BalanceRequest::findOrFail($id);
        $req->delete();
        return redirect()->back()->with('message','Request Rejected Successfully.');
    }

    public function send()
    {
        $user = UserAccount::findOrFail(Auth::user()->id);
        return view('user.sendmoney',compact('user'));
    }

    public function withdraw()
    {
        $countries = Country::all();
        $user = UserAccount::findOrFail(Auth::user()->id);
        return view('user.withdrawmoney',compact('user','countries'));
    }

    public function accountsettings()
    {
        $countries = Country::all();
        $user = UserAccount::findOrFail(Auth::user()->id);
        return view('user.accountsettings',compact('user','countries'));
    }

    public function accountsecurity()
    {
        $user = UserAccount::findOrFail(Auth::user()->id);
        return view('user.securitysettings',compact('user'));
    }

    public function deposit()
    {
        $user = UserAccount::findOrFail(Auth::user()->id);
        return view('user.depositmoney',compact('user'));
    }

    public function transactions()
    {
        $transactions = Transaction::where('mainacc',Auth::user()->id)->where('status',1)->orderby('id','desc')->get();
        $user = UserAccount::findOrFail(Auth::user()->id);
        return view('user.transactions',compact('user','transactions'));
    }

    public function sendsubmit(Request $request)
    {
        if($request->amount > 0) {
            $to = UserAccount::where('email', $request->email);
            $from = UserAccount::findOrFail(Auth::user()->id);
            if ($to->exists()) {
                $transcharge = Settings::findOrFail(1);
                $charge = $transcharge->transfer_charge;
                $extra = $transcharge->extra_charge;
                $charge_total = ($extra / 100) * $request->amount + $charge;
                $charge_final = number_format((float)$charge_total, 2, '.', '');

                $amount = $request->amount + $charge_total;
                $amount = number_format((float)$amount, 2, '.', '');

                if ($from->current_balance >= $amount) {

                    $transid = strtoupper($this->goRandomString(4) . str_random(3) . $this->goRandomString(4));

                    $balance1['current_balance'] = $from->current_balance - $amount;
                    $from->update($balance1);

                    $toacc = $to->first();
                    $balance2['current_balance'] = $toacc->current_balance + $request->amount;
                    $toacc->update($balance2);

                    $sendertrans = new Transaction();
                    $sendertrans['transid'] = $transid;
                    $sendertrans['mainacc'] = Auth::user()->id;
                    $sendertrans['accto'] = $toacc->id;
                    $sendertrans['accfrom'] = Auth::user()->id;
                    $sendertrans['type'] = "debit";
                    $sendertrans['sign'] = "-";
                    $sendertrans['reference'] = $request->reference;
                    $sendertrans['reason'] = "Payment Sent";
                    $sendertrans['amount'] = $request->amount;
                    $sendertrans['fee'] = $charge_final;
                    $sendertrans['reference'] = $request->reference;
                    $sendertrans['trans_date'] = date('Y-m-d H:i:s');
                    $sendertrans['status'] = 1;
                    $sendertrans->save();


                    $receivertrans = new Transaction();
                    $receivertrans['transid'] = $transid;
                    $receivertrans['mainacc'] = $toacc->id;
                    $receivertrans['accto'] = $toacc->id;
                    $receivertrans['accfrom'] = Auth::user()->id;
                    $receivertrans['type'] = "credit";
                    $receivertrans['sign'] = "+";
                    $receivertrans['reference'] = $request->reference;
                    $receivertrans['reason'] = "Payment Received";
                    $receivertrans['amount'] = $request->amount;
                    $receivertrans['fee'] = "0";
                    $receivertrans['reference'] = $request->reference;
                    $receivertrans['trans_date'] = date('Y-m-d H:i:s');
                    $receivertrans['status'] = 1;
                    $receivertrans->save();

                    return redirect()->back()->with('message', 'Amount Sent Successfully.');

                } else {
                    return redirect()->back()->with('error', 'Insufficient Balance.')->withInput();
                }
            }
            return redirect()->back()->with('error', 'No Sender Account Found With this email.')->withInput();
        }
        return redirect()->back()->with('error','Please enter a valid amount.')->withInput();
    }

    public function withdrawsubmit(Request $request)
    {
        $from = UserAccount::findOrFail(Auth::user()->id);

        $withdrawcharge = Settings::findOrFail(1);
        $charge = $withdrawcharge->withdraw_fee;

        if($request->amount > 0){

            $amount = $request->amount + $charge;
            $amount = number_format((float)$amount,2,'.','');

            if ($from->current_balance >= $amount){

                $balance1['current_balance'] = $from->current_balance - $amount;
                $from->update($balance1);

                $newwithdraw = new Withdraw();
                $newwithdraw['acc'] = Auth::user()->id;
                $newwithdraw['method'] = $request->methods;
                $newwithdraw['acc_email'] = $request->acc_email;
                $newwithdraw['iban'] = $request->iban;
                $newwithdraw['country'] = $request->acc_country;
                $newwithdraw['acc_name'] = $request->acc_name;
                $newwithdraw['address'] = $request->address;
                $newwithdraw['swift'] = $request->swift;
                $newwithdraw['reference'] = $request->reference;
                $newwithdraw['amount'] = $request->amount;
                $newwithdraw['fee'] = $charge;
                $newwithdraw->save();

                return redirect()->back()->with('message','Withdraw Request Sent Successfully.');

            }else{
                return redirect()->back()->with('error','Insufficient Balance.')->withInput();
            }
        }
        return redirect()->back()->with('error','Please enter a valid amount.')->withInput();
    }

    public function depositsubmit(Request $request)
    {

        if($request->total > 0){

                $newdeposit = new Deposit();
                $newdeposit['accid'] = Auth::user()->id;
                $newdeposit['deposit_method'] = $request->methods;
                $newdeposit['amount'] = $request->total;
                $newdeposit['bank_information'] = $request->bank_info;
                $newdeposit['mobile_information'] = $request->mobile_info;
                $newdeposit->save();

                $settings = Settings::findOrFail(1);
                $to = Auth::user()->id;
                $subject = "New Account Deposit Request Received";
                $txt = "Hello Admin,\nA New Deposit Request Received of Amount ".$settings->currency_sign.$request->total.". Please login to your Account to check.";
                $headers = "From: ".$settings->title."<".$settings->email.">";
                mail($to,$subject,$txt,$headers);

                return redirect()->back()->with('message','Deposit Request Sent Successfully.');

        }
        return redirect()->back()->with('error','Please enter a valid amount.')->withInput();
    }


    public function request()
    {
        $user = UserAccount::findOrFail(Auth::user()->id);
        return view('user.requestmoney',compact('user'));
    }

    public function requestsubmit(Request $request)
    {
        if($request->amount > 0) {
            $to = UserAccount::where('email',$request->email);
            if ($to->exists()){
                $newreq = new BalanceRequest();
                $newreq['accto'] = $to->first()->id;
                $newreq['accfrom'] = Auth::user()->id;
                $newreq['amount'] = $request->amount;
                $newreq['reference'] = $request->reference;
                $newreq['req_date'] = date('Y-m-d H:i:s');
                $newreq->save();
                return redirect()->back()->with('message','Amount Request Sent Successfully.');
            }
            return redirect()->back()->with('error','No Account Found With this email.')->withInput();
        }
        return redirect()->back()->with('error','Please enter a valid amount.')->withInput();
    }

    public function update(Request $request, $id)
    {
        $user = UserAccount::findOrFail($id);
        $input = $request->all();
        $user->update($input);
        return redirect()->back()->with('message','Account Information Updated Successfully.');

    }

    public function passchange(Request $request, $id)
    {
        $user = UserAccount::findOrFail($id);
        $input['password'] = "";
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){

                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('error', 'Confirm Password Does not match.');
                    return redirect()->back();
                }
            }else{
                Session::flash('error', 'Current Password Does not match');
                return redirect()->back();
            }
        }
        $user->update($input);
        return redirect()->back()->with('message','Account Password Updated Successfully.');

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
