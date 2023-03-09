<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
     
    protected $fillable = [
        'name', 'status','content_desc','link','user_id','slider_thumb'
        
    ];

    function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
