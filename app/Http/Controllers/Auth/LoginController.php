<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\VerifyMail;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request,[
            'username' => ['required'],
            'password' => ['required'],
        ],[
            'username.required'=>'Email or password is required'
        ]
    );

      $user=User::where('email',$request->username)->orWhere('username',$request->username)->first();
      if (!is_null($user)) {
         if ($user->email_active==2) {
           
                $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
               if (Auth::guard('web')->attempt([$field=>$request->username,'password'=>$request->password],$request->remember)) {

                    $notification=array(
                    'messege'=>'Successfully loged in',
                       'alert-type'=>'success'
                     );
                   return redirect(route('home'))->with($notification);
               }else{
                    $notification=array(
                    'messege'=>'Invalid credential.',
                    'alert-type'=>'error'
                     );
                   return Redirect()->back()->with($notification);
               }
         }else{
             session()->flash('error_message','Your Email is not verified.Please verify email');
               return redirect(route('login'));
         }
      }else{
             $notification=array(
             'messege'=>'No account found.Please sign up',
             'alert-type'=>'error'
              );
            return Redirect()->back()->with($notification);
      }
          
    }
}
