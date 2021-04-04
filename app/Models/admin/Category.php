<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $gurded=[];

    public function video(){
    	return $this->hasMany('App\Models\admin\Video');
    }

}
