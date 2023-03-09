<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'status','content','slug_page','user_id'
        
    ];

    function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
