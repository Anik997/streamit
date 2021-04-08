<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\admin\Admin;
use Image;
use Str;
use Hash;
use Auth;

class AdminController extends Controller
{

	function __construct(){
    	$this->middleware('auth:admin');
    }
    
    public function index(){
    	return view('admin.home');
    }

    public function contact(){
    	$contacts=Contact::latest()->get();
    	return view('admin.contact',compact('contacts'));
    }

    public function profile(){
        return view('admin.profile');
    }

    public function update(Request $request){
                //dd($request->all());

                $u=Auth::user();
                $user=Admin::findOrFail($u->id);
                $user->name=$request->name;
                

                if ($request->hasFile('avatar')) {
                      $avatar=$request->avatar;
                      $avatar_name=strtolower(Str::random(10)).time().".".$avatar->getClientOriginalExtension();
                
                      $image_path = public_path('assets/backend/profile/'.$avatar_name);
                     

                      if (file_exists(public_path('assets/backend/profile/'.$user->avatar))) {

                          unlink(public_path('assets/backend/profile/'.$user->avatar));
                      }

                      Image::make($avatar)->save($image_path);
                     
                      $user->avatar=$avatar_name;
                }
                $user->save();

                $notification=['alert'=>'success','message'=>'Successfully updated','status'=>200];
                return json_encode($notification);

    }


    public function password_change(Request $request){
       $u=Auth::user();
       $admin=Admin::findOrFail($u->id);

        if ($request->cpass) {
          if (Hash::check($request->cpass,$admin->password)) {
              if ($request->npass==$request->password_confirmation) {
                  $admin->password=Hash::make($request->npass);
                     $admin->save();
                     $notification=['alert'=>'error','message'=>'Password Successfully updated','status'=>200];
              }else{
               $notification=['alert'=>'error','message'=>'Confirm password not match','status'=>500];
               
              }
          }else{
              $notification=['alert'=>'error','message'=>'Old Password not match','status'=>500];
           // return redirect()->back()->with($notification);
          }
        } 


    return json_encode($notification);
    }
    
}
