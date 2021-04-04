<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\Video;

class MovieTVController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($slug){
       
    	$movie_tv=Video::where('slug',$slug)->first();
    	//return $movie_tv;
    	if (!is_null($movie_tv)) {
    		$view=$movie_tv->view;
    		$movie_tv->view =1+$view;
    		$movie_tv->save();
    	$more_likes=Video::where(['category_id'=>$movie_tv->category_id])
    	->latest()->take(4)->get();
    	$upcommings=Video::where(['category_id'=>$movie_tv->category_id,'type'=>'Upcoming'])
    	->latest()->take(4)->get();
    	}
    	return view('pages.detail_movie_tv',compact('movie_tv','more_likes','upcommings'));
    }



}
