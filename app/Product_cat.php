<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_cat extends Model
{
    //
    protected $fillable = [
        'name', 'status','slug_productCat','user_id','parent_cat'
        
    ];
    function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
