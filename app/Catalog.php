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


public function scopeActive($query){

return $query->where('active',1);

}

 public function products()
    {
        return $this->hasMany('App\Product');
    }

}
