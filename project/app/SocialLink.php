<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $table = "social_links";
    protected $fillable = ['facebook', 'twiter', 'g_plus', 'linkedin', 'f_status', 't_status', 'g_status', 'link_status'];
    public $timestamps = false;
}
