<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
   protected $fillable = ['first_name', 'last_name', 'current_address', 'phone_number', 'facebook', 'instagram', 'profile_image', 'created_at', 'updated_at'];
}
