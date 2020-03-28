<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    public $fillable = ['phone', 'message', 'email'];
    public $timestamps = false;
}
