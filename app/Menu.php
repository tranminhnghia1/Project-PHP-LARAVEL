<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'name', 'status','content_desc','link','user_id','parent_id'
        
    ];

    function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
