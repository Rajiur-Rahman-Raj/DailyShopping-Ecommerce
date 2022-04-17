<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{

  protected $fillable = ['category_id', 'sub_category_name', 'created_at', 'updated_at'];
  function relationshiptocategory(){
    return $this->hasOne('App\Category', 'id', 'category_id');
  }
}
