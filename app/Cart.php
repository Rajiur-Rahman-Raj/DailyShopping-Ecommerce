<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  function relationtoproduct(){
    return $this->hasOne('App\Product', 'id', 'product_id');
  }
}
