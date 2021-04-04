<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Str;
use Image;

class ProfileController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }

    public function manage_profile(){


    	return view('pages.profile.profile');
    }

    public function update_profile(Request $request){

    		$u=Auth::user();
    		$user=User::findOrFail($u->id);
    		$user->name=$request->name;
    		$user->phone=$request->phone;
    		$user->address=$request->address;

    		if ($request->hasFile('avatar')) {
    		      $avatar=$request->avatar;
    		      $avatar_name=strtolower(Str::random(10)).time().".".$avatar->getClientOriginalExtension();
    		
    		      $image_path = public_path('assets/frontend/profile/'.$avatar_name);
    		     

    		      if (file_exists(public_path('assets/frontend/profile/'.$user->avatar))) {

    		          unlink(public_path('assets/frontend/profile/'.$user->avatar));
    		      }

    		      Image::make($avatar)->save($image_path);
    		     
    		      $user->avatar=$avatar_name;
    		}
    		$user->save();

    		$notification=['alert'=>'success','message'=>'Successfully updated','status'=>200];
    		return json_encode($notification);
	
    }		
}
