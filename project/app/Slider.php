<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'text', 'image', 'text_position','status'];
    public $timestamps = false;
}
