<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\Video;
use App\Models\Contact;

class FrontendController extends Controller
{

	
    public function index(){
    	$regulars=Video::where(['status'=>1,'type'=>'Regular'])->latest()->take(4)->get();
    	$upcomings=Video::where(['status'=>1,'type'=>'Upcoming'])->latest()->take(4)->get();
    	$trendings=Video::where(['status'=>1,'type'=>'Trending'])->latest()->take(5)->get();
    	$traillers=Video::where(['status'=>1])->latest()->take(4)->get();
  
    	return view('home',compact('regulars','upcomings','trendings','traillers'));
    }


    public function show_trailler($slug){

    	$trailler=Video::where('slug',$slug)->first();
    	//return $movie_tv;
    	if (!is_null($trailler)) {
    		$trailler_view=$trailler->trailler_view;
    		$trailler->trailler_view =1+$trailler_view;
    		$trailler->save();
    		$more_trillers = Video::where('category_id','=',$trailler->category_id)->where('trailler_name','!=',null)->latest()->take(10)->get();
    	
    	}
    	return view('pages.show_trailler',compact('trailler','more_trillers'));

    }

    public function all_trailler(){
    	$latest=Video::latest()->first();
    	$traillers=Video::latest()->get();
    	return view('pages.all_trailler',compact('latest','traillers'));
    }



    public function all_regular(){
        $regulars=Video::where('type','Regular')->get();
        return view('pages.all_regular_video',compact('regulars'));
    }

    public function all_upcomming(){
        $upcomings=Video::where('type','Upcoming')->get();
        return view('pages.all_upcomming_video',compact('upcomings'));
    }

 

    public function all_trending(){
        $trendings=Video::where('type','Trending')->get();
        return view('pages.all_trending_video',compact('trendings'));
    }


    public function all_movie($id=null,$type=null){

    	if (!is_null($type) && $type==="lang") {
    		$movies=Video::where('language_id',$id)->where('vedio_type','Movies')->get();
    	}elseif (!is_null($type) && $type==="cat") {
    		$movies=Video::where('category_id',$id)->where('vedio_type','Movies')->get();
    	}else{
    		$movies=Video::latest()->where('vedio_type','Movies')->get();
    	}
    	
    	return view('pages.all_movie',compact('movies'));
    }

    public function all_tv_show($id=null, $type=null){

    	if (!is_null($type) && $type==="lang") {
    		$tv_shows=Video::where('language_id',$id)->where('vedio_type','TV Shows')->get();
    	}elseif (!is_null($type) && $type==="cat") {
    		$tv_shows=Video::where('category_id',$id)->where('vedio_type','TV Shows')->get();
    	}else{
    		$tv_shows=Video::latest()->where('vedio_type','TV Shows')->get();
    	}
    	
    	return view('pages.all_tv_show',compact('tv_shows'));

    }

    public function contact_page(){
        return view('pages.contact');
    }

    public function contact_store(Request $request){

                $this->validate($request,[
                    
                    'name' => ['required', 'string'],
                    'email' => ['required','email'],
                    'content' => ['required'],
                ]);

            $contact=new Contact();
            $contact->name=$request->name;
            $contact->email=$request->email;
            $contact->message=$request->content;

            $contact->save();

            $notification=array(
            'messege'=>'Successfully submitted',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }


}
