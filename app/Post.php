<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'status','content','slug_post','post_desc','user_id','thumnail','cat_id'
        
    ];
    function post_cat(){
        return $this->belongsTo('App\Post_cat','cat_id');
    }
    
    function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
