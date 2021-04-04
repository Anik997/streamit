<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PurchasePackage extends Model
{
    protected $guarded=[];

    public function user(){
    	return $this->belongsTo('App\Models\User','user_id');
    }

     public function package(){
    	return $this->belongsTo('App\Models\admin\Package','package_id');
    }
}
