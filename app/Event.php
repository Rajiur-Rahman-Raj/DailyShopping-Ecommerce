<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['event_title', 'event_description', 'author', 'event_date', 'event_image', 'created_at', 'updated_at'];
}
