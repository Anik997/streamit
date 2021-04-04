<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded=[];

    public function category(){
    	return $this->belongsTo('App\Models\admin\Category');
    }

    public function language(){
    	return $this->belongsTo('App\Models\admin\Language');
    }
} 
