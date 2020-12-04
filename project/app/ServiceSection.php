<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    protected $table = "service_section";
    protected $fillable = ['title', 'text', 'icon'];
    public $timestamps = false;
}
