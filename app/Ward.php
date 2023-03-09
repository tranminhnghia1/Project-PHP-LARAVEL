<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
    protected $fillable = ['ward_id','name','type','district_id'];
    function district(){
        return $this->belongsTo('App\Province','district_id');
    }
}
