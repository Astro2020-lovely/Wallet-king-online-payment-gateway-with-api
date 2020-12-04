<?php

namespace App\Http\Controllers;

use App\Classes\GetUserAgents;
use App\Country;
use App\Settings;
use App\SupportTicket;
use App\Transaction;
use App\UserAccount;
use App\UserLogins;
use App\Withdraw;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        $customers = UserAccount::orderBy('id','desc')->get();
        return view('admin.customers',compact('customers'));
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

    public function acc_status($id,$status)
    {
        $user = UserAccount::findOrFail($id);
        if ($user->account_status == $status){
            return redirect()->back()->with('message','This Account is Already '.ucfirst($status));
        }else{
            $stat['account_status'] = $status;
            $user->update($stat);
            return redirect()->back()->with('message','Account Status Updated Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = UserAccount::findOrFail($id);
        $countries = Country::all();
        $transactions = Transaction::where('mainacc',$customer->id)->get();
        $deposits = Transaction::where('mainacc',$customer->id)->where('type','deposit')->get();
        $withdraws = Withdraw::where('acc',$customer->id)->get();
        $logins = UserLogins::where('userid',$customer->id)->get();
        return view('admin.customerdetails',compact('customer','countries','transactions','deposits','withdraws','logins'));
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

    public function manage_balance($id)
    {
        $customer = UserAccount::findOrFail($id);
        $transactions = Transaction::where('mainacc',$customer->id)->get();
        return view('admin.managebalance',compact('customer','transactions'));
    }

    public function manage_balance_operation(Request $request,$id)
    {
        $customer = UserAccount::findOrFail($id);
        $amount = $request->amount;
        $operation = $request->operation;
        $rands = new GetUserAgents();
        if ($amount > 0){
            $transid = strtoupper($rands->goRandomString(4).str_random(3).$rands->goRandomString(4));

            if ($operation == "add"){

                $balance1['current_balance'] = $customer->current_balance + $amount;
                $customer->update($balance1);

                $receivertrans = new Transaction();

                $receivertrans['transid'] = $transid;
                $receivertrans['mainacc'] = $customer->id;
                $receivertrans['accto'] = $customer->id;
                $receivertrans['accfrom'] = null;
                $receivertrans['type'] = "deposit";
                $receivertrans['sign'] = "+";
                $receivertrans['reference'] = "Account Deposited By Admin";
                $receivertrans['reason'] = "Account Deposit";
                $receivertrans['amount'] = $amount;
                $receivertrans['deposit_method'] = "By Admin";
                $receivertrans['fee'] = "0";
                $receivertrans['trans_date'] = date('Y-m-d H:i:s');
                $receivertrans['status'] = 1;
                $receivertrans->save();


                return redirect()->back()->with('message','Amount Added Successfully.');
            }

            if ($operation == "subtract"){


                $balance2['current_balance'] = $customer->current_balance - $amount;
                $customer->update($balance2);


                $receivertrans = new Transaction();
                $receivertrans['transid'] = $transid;
                $receivertrans['mainacc'] = $customer->id;
                $receivertrans['accto'] = null;
                $receivertrans['accfrom'] = null;
                $receivertrans['type'] = "withdraw";
                $receivertrans['sign'] = "-";
                $receivertrans['reference'] = "Account Withdrawn By Admin";
                $receivertrans['reason'] = "Account Withdraw";
                $receivertrans['amount'] = $amount;
                $receivertrans['fee'] = '0';
                $receivertrans['trans_date'] = date('Y-m-d H:i:s');
                $receivertrans['status'] = 1;
                $receivertrans->save();

                return redirect()->back()->with('message','Amount Subtracted Successfully');
            }

        }

        return redirect()->back()->with('error','Please Enter a Valid Amount.');
    }

    public function email($id)
    {
        $customer = UserAccount::findOrFail($id);
        return view('admin.sendemail', compact('customer'));
    }

    public function sendemail(Request $request)
    {
        mail($request->to,$request->subject,$request->message);
        return redirect('admin/customers')->with('message','Email Send Successfully');
    }


    public function createTicket($id)
    {
        $customer = UserAccount::findOrFail($id);
        return view('admin.createticket', compact('customer'));
    }

    public function createTicketsubmit(Request $request)
    {
        $ticket = new SupportTicket();
        $ticket->fill($request->all());
        $ticket['by_admin'] = 1;
        $ticket->save();

        $settings = Settings::findOrFail(1);
        $user = UserAccount::findOrFail($request->userid);
        $to = $user->email;
        $subject = "New Ticket Created";
        $txt = "Hello ".$user->name.",\nA new Ticket Created By Staff. Please login to your Account to check.";
        $headers = "From: ".$settings->title."<".$settings->email.">";
        mail($to,$subject,$txt,$headers);

        return redirect('admin/customers')->with('message','Ticket Created Successfully');
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
        $customer = UserAccount::findOrFail($id);
        $data = $request->all();
        $customer->update($data);
        return redirect()->back()->with('message','Customer Information Updated Successfully.');
    }

    public function status($id,$status)
    {
        $customer = UserAccount::findOrFail($id);
        $data['status']=$status;
        $customer->update($data);
        return redirect('admin/customers')->with('message','Customer Account Status Changed Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = UserAccount::findOrFail($id);
        $customer->delete();
        return redirect('admin/customers')->with('message','Customer Delete Successfully.');
    }

}
