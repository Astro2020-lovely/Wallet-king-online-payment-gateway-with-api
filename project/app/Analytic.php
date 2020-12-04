<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    protected $fillable = ['info', 'type', 'total', 'todays_total'];

    public $timestamps = false;
}
