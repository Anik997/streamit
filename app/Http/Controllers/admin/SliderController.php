<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Slider;
use Image;
use Str;
class SliderController extends Controller
{
    	function __construct(){
        	$this->middleware('auth:admin');
        }

        public function index(){
        	$sliders=Slider::latest()->get();
        	return view('admin.slider.index',compact('sliders'));

        }

        public function edit($id){
        	$slider=Slider::findOrFail($id);
        	return view('admin.slider.edit',compact('slider'));
        }

        public function update(Request $request){

        	$slider=Slider::findOrFail($request->id);

        	if ($request->hasFile('slider_image')) {
        	      $slider_image=$request->slider_image;
        	      $slider_image_name=strtolower(Str::random(10)).time().".".$slider_image->getClientOriginalExtension();
        	
        	      $image_path = public_path('assets/backend/slider/'.$slider_image_name);
        	     

        	      if (file_exists(public_path('assets/backend/slider/'.$slider->slider_image_name))) {

        	          unlink(public_path('assets/backend/slider/'.$slider->slider_image));
        	      }

        	      Image::make($slider_image)->save($image_path);
        	     
        	      $slider->slider_image=$slider_image_name;
        	}

        	$slider->type=$request->type;
        	$slider->save();
        	$notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];
        	return json_encode($notification);
        }


        public function delete(Request $request){
           //  dd($request->all());
             $item=Slider::findOrFail($request->slider_id);

             // delete all thumbnail

            if (file_exists(public_path('assets/backend/slider/'.$item->slider_image))) {

                   	   unlink(public_path('assets/backend/slider/'.$item->slider_image));
               }

             $item->delete();

             $notification=['alert'=>'success','message'=>'Successfully delete','status'=>200];
             return json_encode($notification);
         }
}
