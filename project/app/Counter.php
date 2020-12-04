<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $fillable = ['title', 'icon','number'];

    public $timestamps = false;
}
