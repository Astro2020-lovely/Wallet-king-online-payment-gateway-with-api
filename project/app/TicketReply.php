<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $table = "ticket_replies";
    protected $fillable = ['ticket_id','userid', 'reply_by', 'message', 'reply_time'];
    public $timestamps = false;
}
