<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    //
    use SoftDeletes;
   
    protected $fillable = [
        'name', 'status','content','slug_product','price_product','number_product','featured','product_thumb','product_image'
        ,'parent_cat','content_desc','user_id','cat_id','discount'
        
    ];
    function user(){
        return $this->belongsTo('App\User','user_id');
    }
    function product_cat(){
        return $this->belongsTo('App\Product_cat','cat_id');
    }
}
