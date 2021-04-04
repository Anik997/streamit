<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Video;
use Str;
use Image;
class VideoController extends Controller
{
    
    		function __construct(){
    	    	$this->middleware('auth:admin');
    	    }

    	    public function index(){
    	    	$videos=Video::latest()->get();
    	    	return view('admin.video.index',compact('videos'));
    	    }

    	    public function showForm(){
    	    	return view('admin.video.add');
    	    }

    	    public function store(Request $request){

    	    	$video               =new Video();
    	    	$video->title        =$request->title;
    	    	$video->name         =$request->name;
    	    	$video->description  =$request->description;
    	    	$video->category_id  =$request->category_id;
    	    	$video->vedio_type   =$request->vedio_type;
    	    	$video->type         =$request->type;
    	    	$video->quality      =$request->quality;
    	    	$video->language_id  =$request->language_id;
    	    	$video->release_year =$request->release_year;
    	    	$video->slug         =strtolower(str_replace(' ','-',$request->name)).'-'.strtolower(str_replace(' ','-',$request->title)).'-'.time();
                
    	    	if (!empty($request->video_link)) {
    	    		$video->video_link=$request->video_link;
    	    	}
                // count video duration
                $getID3 = new \getID3;
                $file = $getID3->analyze($request->movie_tv);
                $duration = date('H:i:s', $file['playtime_seconds']);

    	    	$video->duration =$duration;
    	    	
    	    	
    	    	// save thumbnail
    	    	if ($request->hasFile('thumbnail')) {
	    	          $thumbnail=$request->thumbnail;
	    	          $thumbnail_name=strtolower(Str::random(10)).time().".".$thumbnail->getClientOriginalExtension();
	    	    
	    	          $original_image_path = public_path('assets/backend/video/store/thumbnail/orginal/'.$thumbnail_name);
	    	          $small_image_path = public_path('assets/backend/video/store/thumbnail/small/'.$thumbnail_name);
	    	          $large_image_path = public_path('assets/backend/video/store/thumbnail/large/'.$thumbnail_name);

	    	          Image::make($thumbnail)->save($original_image_path);
	    	          Image::make($thumbnail)->resize(385,216)->save($small_image_path);
	    	          Image::make($thumbnail)->resize(500,500)->save($large_image_path);
	    	          $video->thumbnail=$thumbnail_name;
        
    	    	}
    	    	// save trailler_video

    	    	if ($request->hasFile('trailler_video')) {

    	    	   $trailler_video_file=$request->trailler_video;
    	    	   $trailler_name=strtolower(Str::random(10)).time().".".$trailler_video_file->getClientOriginalExtension();
    	    	   $trailer_path='assets/backend/video/store/trailler/';
    	    	 
    	    	   $trailler_video_file->move($trailer_path,$trailler_name);
    	    	   $video->trailler_name=$trailler_name;
    	    	}
    	    	// save video
    	    	if ($request->hasFile('movie_tv')) {

    	    	   $movie_tv_file=$request->movie_tv;
    	    	   $video_name=strtolower(Str::random(10)).time().".".$movie_tv_file->getClientOriginalExtension();
    	    	   $video_path='assets/backend/video/store/movie_tv_show/';
    	    	 
    	    	   $movie_tv_file->move($video_path,$video_name);
    	    	   $video->video_name=$video_name;
    	    	}

    	       $save=$video->save();
    	    
	    		if (!is_null($save)) {

                    $notification=['alert'=>'success','message'=>'Video uploaded successfully','status'=>200];

                }else{
                     $notification=['alert'=>'error','message'=>'Something went wrong','status'=>500];
                }

              return json_encode($notification);

    	    }

    public function show($id){
        $video=Video::findOrFail($id);
        return view('admin.video.show',compact('video'));
    }

    public function basic_edit($id){
            $item=Video::findOrFail($id);
         return view('admin.video.basic_edit',compact('item'));
    }

    public function basic_update(Request $request){
        $video=Video::findOrFail($request->id);
       
        $this->validate($request,[
            'name'=>'required|unique:videos,name,'.$video->id,
        ]);

       
       $video->title        =$request->title;
       $video->name         =$request->name;
       $video->description  =$request->description;
       $video->category_id  =$request->category_id;
       $video->vedio_type   =$request->vedio_type;
       $video->type         =$request->type;
       $video->quality      =$request->quality;
       $video->language_id  =$request->language_id;
       $video->release_year =$request->release_year;
       $video->slug         =strtolower(str_replace(' ','-',$request->name)).'-'.strtolower(str_replace(' ','-',$request->title)).'-'.time();
             
       if (!empty($request->video_link)) {
          $video->video_link=$request->video_link;
       }
       $video->save();

       $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];
       return json_encode($notification);
    }

    public function media_edit($id){
           $item=Video::findOrFail($id);
        return view('admin.video.media_edit',compact('item'));
    }

    public function media_update(Request $request){
       // dd($request->all());

        $item=Video::findOrFail($request->id);
            // update thumbnail
            if ($request->hasFile('thumbnail')) {
                  $thumbnail=$request->thumbnail;
                  $thumbnail_name=strtolower(Str::random(10)).time().".".$thumbnail->getClientOriginalExtension();
            
                  $original_image_path = public_path('assets/backend/video/store/thumbnail/orginal/'.$thumbnail_name);
                  $small_image_path = public_path('assets/backend/video/store/thumbnail/small/'.$thumbnail_name);
                  $large_image_path = public_path('assets/backend/video/store/thumbnail/large/'.$thumbnail_name);

                  if (file_exists(public_path('assets/backend/video/store/thumbnail/orginal/'.$item->thumbnail))) {

                      unlink(public_path('assets/backend/video/store/thumbnail/orginal/'.$item->thumbnail));
                  }

                  if (file_exists(public_path('assets/backend/video/store/thumbnail/small/'.$item->thumbnail))) {
                                                                                                                     
                      unlink(public_path('assets/backend/video/store/thumbnail/small/'.$item->thumbnail));
                  }

                  if (file_exists(public_path('assets/backend/video/store/thumbnail/large/'.$item->thumbnail))) {
                                                                                                                     
                      unlink(public_path('assets/backend/video/store/thumbnail/large/'.$item->thumbnail));
                  }

                  Image::make($thumbnail)->save($original_image_path);
                  Image::make($thumbnail)->resize(385,216)->save($small_image_path);
                  Image::make($thumbnail)->resize(500,500)->save($large_image_path);
                  $item->thumbnail=$thumbnail_name;
    
            }

            // update video thiller

            if ($request->hasFile('trailler_video')) {

               $trailler_video_file=$request->trailler_video;
               $trailler_name=strtolower(Str::random(10)).time().".".$trailler_video_file->getClientOriginalExtension();
               $trailer_path='assets/backend/video/store/trailler/';

               if (file_exists(public_path('assets/backend/video/store/trailler/'.$item->trailler_name))) {

                   unlink(public_path('assets/backend/video/store/trailler/'.$item->trailler_name));
               }
             
               $trailler_video_file->move($trailer_path,$trailler_name);
               $item->trailler_name=$trailler_name;
            }

            // update video

            if ($request->hasFile('movie_tv')) {

                $getID3 = new \getID3;
                $file = $getID3->analyze($request->movie_tv);
                $duration = date('H:i:s', $file['playtime_seconds']);

                $item->duration =$duration;

               $movie_tv_file=$request->movie_tv;
               $video_name=strtolower(Str::random(10)).time().".".$movie_tv_file->getClientOriginalExtension();
               $video_path='assets/backend/video/store/movie_tv_show/';


               if (file_exists(public_path('assets/backend/video/store/movie_tv_show/'.$item->video_name))) {

                   unlink(public_path('assets/backend/video/store/movie_tv_show/'.$item->video_name));
               }
             
               $movie_tv_file->move($video_path,$video_name);
               $item->video_name=$video_name;

            }

            $item->save();

            $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];
            return json_encode($notification);
   }


   public function delete(Request $request){
      //  dd($request->all());
        $item=Video::findOrFail($request->video_id);

        // delete all thumbnail

        if (file_exists(public_path('assets/backend/video/store/thumbnail/orginal/'.$item->thumbnail))) {

            unlink(public_path('assets/backend/video/store/thumbnail/orginal/'.$item->thumbnail));
        }

        if (file_exists(public_path('assets/backend/video/store/thumbnail/small/'.$item->thumbnail))) {
                                                                                                           
            unlink(public_path('assets/backend/video/store/thumbnail/small/'.$item->thumbnail));
        }

        if (file_exists(public_path('assets/backend/video/store/thumbnail/large/'.$item->thumbnail))) {
                                                                                                           
            unlink(public_path('assets/backend/video/store/thumbnail/large/'.$item->thumbnail));
        }

        // delete triller

        if (file_exists(public_path('assets/backend/video/store/trailler/'.$item->trailler_name))) {

            unlink(public_path('assets/backend/video/store/trailler/'.$item->trailler_name));
        }
         // delete video
        if (file_exists(public_path('assets/backend/video/store/movie_tv_show/'.$item->video_name))) {

            unlink(public_path('assets/backend/video/store/movie_tv_show/'.$item->video_name));
        }

        $item->delete();

        $notification=['alert'=>'success','message'=>'Successfully delete()','status'=>200];
        return json_encode($notification);
    }
}
