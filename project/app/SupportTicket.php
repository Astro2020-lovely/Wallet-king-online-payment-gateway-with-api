<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $table = "support_tickets";
    protected $fillable = ['ticket_number', 'by_admin', 'userid', 'subject', 'description', 'created_at', 'updated_at', 'status'];
}
