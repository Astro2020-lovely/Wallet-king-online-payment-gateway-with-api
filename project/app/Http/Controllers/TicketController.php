<?php

namespace App\Http\Controllers;

use App\Settings;
use App\SupportTicket;
use App\TicketReply;
use App\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $tickets = SupportTicket::orderBy('id','desc')->get();
        return view('admin.tickets',compact('tickets'));
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

    public function submitreply(Request $request,$id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $reply = new TicketReply();
        $reply->ticket_id = $id;
        $reply->message = $request->reply;
        $reply->userid = Auth::user()->id;
        $reply->reply_by = "admin";
        $reply->reply_time = date('Y-m-d H:i:s');
        $reply->save();

        $settings = Settings::findOrFail(1);
        $to = UserAccount::findOrFail($ticket->userid)->email;
        $subject = "Support Ticket Replied By Admin";
        $txt = "Hello Admin,\nYour Support Ticket is Replied By Admin. Please login to your Account to check.";
        $headers = "From: ".$settings->title."<".$settings->email.">";
        mail($to,$subject,$txt,$headers);

        return back()->with('message','Ticket Replied Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $replies = TicketReply::where('ticket_id',$id)->get();

        if ($ticket->status == 'open'){
            $data['status'] = 'processing';
            $ticket->update($data);
        }
        return view('admin.viewticket',compact('ticket','replies'));
    }

    public function closeticket($id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $data['status'] = 'closed';
        $ticket->update($data);

        $settings = Settings::findOrFail(1);
        $to = $ticket->userid->email;
        $subject = "Support Ticket Closed By Admin";
        $txt = "Hello ".$ticket->userid->name.",\nYour Support Ticket is Marked as Completed By Admin. Please login to your Account to check.";
        $headers = "From: ".$settings->title."<".$settings->email.">";
        mail($to,$subject,$txt,$headers);

        return redirect('admin/support-center')->with('message','Support Ticket Closed Successfully.');
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
