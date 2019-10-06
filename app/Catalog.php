<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
   
protected $fillable = [
      'name', 'description', 'category_type'
  ];


 public $timestamps = true;	
    
 protected $table = 'catalogs';


 public function products()
    {
        return $this->hasMany('App\Product');
    }

}
