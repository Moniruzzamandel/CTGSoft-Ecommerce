<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function creator(){
        return $this->belongsTo('App\User','created_by','id');
    }
    
    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
}
