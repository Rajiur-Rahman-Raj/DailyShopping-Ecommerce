<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['banner_title', 'banner_img', 'created_at', 'updated_at'];
}
