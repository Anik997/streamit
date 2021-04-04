<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Trailler;
use Str;
use Image;

class TraillerController extends Controller
{
    
    	function __construct(){
        	$this->middleware('auth:admin');
        }

        public function index(){
        	$traillers=Trailler::latest()->get();
        	return view('admin.trailler.index',compact('traillers'));
        }

        public function showForm(){
        	return view('admin.trailler.add');
        }

        public function store(Request $request){
        	$this->validate($request,[
        			'title'=>'required|unique:traillers',
        			'thumbnail'=>'required',
        			'trailler_video'=>'required',
        			'description'=>'nullable'
        	]);

        	$trailler=new Trailler();
        	$trailler->title=$request->title;
        	$trailler->description=$request->description;
        	// save thumbnail
        	if ($request->hasFile('thumbnail')) {
        	  $thumbnail=$request->thumbnail;
        	  $thumbnail_name=strtolower(Str::random(10)).time().".".$thumbnail->getClientOriginalExtension();
        	 $location=public_path('assets/backend/thumbnail/trailler/'.$thumbnail_name);
        	  Image::make($thumbnail)->save($location);
        	 $trailler->thumbnail=$thumbnail_name;
        	}
        	// save trailler_video

        	if ($request->hasFile('trailler_video')) {
        	  $trailler_video=$request->trailler_video;
        	  $trailler_video_name=strtolower(Str::random(10)).time().".".$trailler_video->getClientOriginalExtension();
        	 $video_path='assets/backend/video/trailler/';
        	 
        	   $trailler_video->move($video_path,$trailler_video_name);
        	  $trailler->trailler_video=$trailler_video_name;
        	}

        	$trailler->save();
        	session()->flash('success_message','Trailler added Successfully');
        	return redirect()->back();

        }
}
