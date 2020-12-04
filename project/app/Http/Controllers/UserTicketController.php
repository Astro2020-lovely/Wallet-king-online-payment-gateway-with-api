<?php

namespace App\Http\Controllers;

use App\Settings;
use App\SupportTicket;
use App\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = SupportTicket::where('userid',Auth::user()->id)->orderBy('id','desc')->get();
        return view('user.tickets',compact('tickets'));
    }

    public function running()
    {
        $tickets = SupportTicket::where('userid',Auth::user()->id)->where('status','processing')->orderBy('id','desc')->get();
        return view('user.pendingtickets',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.createticket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new SupportTicket();
        $ticket->fill($request->all());
        $ticket->userid = Auth::user()->id;
        $ticket->save();

        $settings = Settings::findOrFail(1);
        $to = $settings->email;
        $subject = "Support Ticket Created";
        $txt = "Hello Admin,\nA new Support Ticket Created By Customer. Please login to your Admin Panel to check.";
        $headers = "From: ".$settings->title."<".$settings->email.">";
        mail($to,$subject,$txt,$headers);

        return redirect('account/support/'.$ticket->id)->with('message','New Support Ticket Created Successfully.');
    }

    public function submitreply(Request $request,$id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $reply = new TicketReply();
        $reply->ticket_id = $id;
        $reply->message = $request->reply;
        $reply->userid = Auth::user()->id;
        $reply->reply_by = "user";
        $reply->reply_time = date('Y-m-d H:i:s');
        $reply->save();

        $data['status'] = 'open';
        $ticket->update($data);

        $settings = Settings::findOrFail(1);
        $to = $settings->email;
        $subject = "Support Ticket Replied";
        $txt = "Hello Admin,\nA Support Ticket Replied By Customer. Please login to your Admin Panel to check.";
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
        if ($ticket->userid != Auth::user()->id){
            return redirect('account/support')->with('message','You Don\'t Have permission to view this Ticket.');
        }
        $input['by_admin'] = 0;
        $ticket->update($input);

        $replies = TicketReply::where('ticket_id',$id)->get();

        return view('user.viewticket',compact('ticket','replies'));
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
