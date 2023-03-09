<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $fillable = ['district_id','name','type','province_id'];
    function province(){
        return $this->belongsTo('App\Province','province_id');
    }
    function wards(){
        return $this->hasMany('App\Ward');
    } 
}
