<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = "faqs";
    protected $fillable = ['question', 'answer', 'status'];
    public $timestamps = false;
}
