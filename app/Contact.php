<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['fname', 'lname', 'email', 'phone', 'subject', 'message', 'created_at', 'updated_at'];
}
