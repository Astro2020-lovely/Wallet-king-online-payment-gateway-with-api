<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\UserAccount;
use App\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
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
        $withdraws = Withdraw::where('status','pending')->orderBy('id','desc')->get();
        return view('admin.withdraws',compact('withdraws'));
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
        $withdraw = Withdraw::findOrFail($id);
        return view('admin.withdrawdetails',compact('withdraw'));
    }

    public function accept($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $transid = strtoupper($this->goRandomString(4).str_random(3).$this->goRandomString(4));
        ;

        $receivertrans = new Transaction();
        $receivertrans['transid'] = $transid;
        $receivertrans['mainacc'] = $withdraw->acc->id;
        $receivertrans['accto'] = null;
        $receivertrans['accfrom'] = null;
        $receivertrans['type'] = "withdraw";
        $receivertrans['sign'] = "-";
        $receivertrans['reference'] = "Account Withdraw Successful";
        $receivertrans['reason'] = "Payment Withdraw";
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

    public function reject($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $account = UserAccount::findOrFail($withdraw->acc->id);
        $data['current_balance'] = $account->current_balance + $withdraw->amount + $withdraw->fee;
        $account->update($data);

        $data['status'] = "rejected";
        $withdraw->update($data);
        return redirect('admin/withdraws')->with('message','Withdraw Rejected Successfully');
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
