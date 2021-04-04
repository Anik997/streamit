<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\MovieType;

class MovieTypeController extends Controller
{
    
    	function __construct(){
        	$this->middleware('auth:admin');
        }

        public function index(){
        	$movieTypes=MovieType::latest()->get();
        	return view('admin.movie_type.index',compact('movieTypes'));
        }

        public function showForm(){
        	return view('admin.movie_type.add');
        }

        public function store(Request $request){
        	$this->validate($request,[
        			'type_name'=>'required|unique:movie_types',
        			'description'=>'required'
        	]);

        	$type=new MovieType();
        	$type->type_name=$request->type_name;
        	$type->description=$request->description;
        	$type->save();
        	session()->flash('success_message','Video type added Successfully');
        	return redirect()->back();

        }

}
