<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    
    protected $gurded=[];

    public function video(){
    	return $this->hasMany('App\Models\admin\Video');
    }
}
