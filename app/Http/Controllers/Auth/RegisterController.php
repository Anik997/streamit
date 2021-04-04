<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Str;
use App\Notifications\VerifyMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function checkusername(Request $request){
            //dd($request->all());
            $user=User::where('username', $request->username)->count();

            if ($user<1) {
                 $message=['status'=>200,'alert'=>'success','message'=>'Username available ✓'];
            }else{
                 $message=['status'=>500,'alert'=>'error','message'=>'Username already exists ✗'];
            }
            

        return json_encode($message);
    }


    public function register(Request $request){

        $this->validate($request,[
            
            'name' => ['required', 'string'],
            'username' => ['required','unique:users'],
            'email' => ['required','unique:users','email'],
            'phone' => ['required','unique:users'],
            'address' => ['nullable'],
            'password' => ['required'],
        ]);

        $user=User::create([
            'name'           =>$request->name,
            'email'          => $request->email,
            'username'       => $request->username,
            'phone'          => $request->phone,
            'address'          => $request->address,
            'password'       => Hash::make($request->password),
            'remember_token' => strtolower(Str::random(60)),
        ]);


       $user->notify(new VerifyMail($user));
        session()->flash('success_message','Please Check your email account to verify email');
        $notification=array(
          'messege'=>'Account created successfully.',
          'alert-type'=>'success'
         );

        return redirect(route('register'))->with($notification);
    }

    public function verifyEmail($token){
       // return $token;
        $user=User::where('remember_token',$token)->first();
        //return $user;
        if (!is_null($user)) {
                  $user->email_active=2;
                  $user->remember_token=null;
                  $user->save();
                  session()->flash('success_message','Email is now verified.Please sing in');
                  return redirect(route('login'));
        }else{
           session()->flash('success_message','Email is already verified.Please sing in');
           return redirect(route('login'));
        }
       
    }
}
