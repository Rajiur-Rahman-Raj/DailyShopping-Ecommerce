<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pricerange extends Model
{
    protected $fillable = ['price_from', 'price_to', 'created_at', 'updated_at'];
}
