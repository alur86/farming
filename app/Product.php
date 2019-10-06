<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
 public $timestamps = true;	
    
 protected $table = 'products';


protected $fillable = [
      'name', 'category_id', 'description'
  ];



 public function catalog()
    {
        return $this->belongsTo('App\Catalog');
    }







}
