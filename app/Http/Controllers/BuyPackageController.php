<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\Package;
use Auth;
use App\Models\PurchasePackage;
use App\Mail\PackagePurchase;
use Mail;

class BuyPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }

    public function index(){
    	$packages=Package::latest()->get();
    	return view('pages.pricing',compact('packages'));
    }

    public function purchase(Request $request){

    	$user=Auth::user();

    	$check_package=PurchasePackage::where('user_id',$user->id)->count();
    	if ($check_package >0) {
    		$message=['status'=>500,'alert'=>'error','message'=>'You are already using one package. Your can update your current package only. Please got to setting or 
                      contact authority or <a style="color:blue" href="'.route('update.purchase.package').'">Update Current Package</a>'];
    	}else{
    		$purchase                     =new PurchasePackage();
    		$purchase->package_id         =$request->package_id;
    		$purchase->user_id            =$user->id;
    		$purchase->payment_name       =$request->payment_name;
    		$purchase->transaction_number =$request->transaction_number ;
    		$purchase->payment_from       =$request->customer_number;

    		 $package_info=array(
    		    'package_name'=>$request->package_name,
    		    'package_price'=>$request->package_price,
    		    'package_duration'=>$request->package_duration,
    		    'user_name'=>$user->name,

    		 );

    		Mail::send(new PackagePurchase($user,$package_info));
   
    		$purchase->save();
    		$message=['status'=>200,'alert'=>'success','message'=>'Successfuly purchased package'];
    	}
    	
    	 return json_encode($message);
    }

    public function update_page(){
             $packages=Package::latest()->get();
             return view('pages.update_package',compact('packages'));   
    }

    public function update_package(Request $request){
            date_default_timezone_set("Asia/Dhaka");
            $user=Auth::user();
            $current_package=PurchasePackage::where('user_id',$user->id)->first();

            $current_package->package_id         =$request->package_id;
            $current_package->user_id            =$user->id;
            $current_package->payment_name       =$request->payment_name;
            $current_package->transaction_number =$request->transaction_number ;
            $current_package->payment_from       =$request->customer_number;
            



            $today=strtotime(date('d F Y h:i:s a'));
            $expire_date=strtotime($current_package->expire_date);
            if ($expire_date > $today) {
                    $remain_time=$expire_date-$today;
                    $day=date('d', $remain_time);
                    $current_package->remain_time=$day;
            }else{

               $current_package->remain_time=null;
            }

            $current_package->start_date         =null;
            $current_package->expire_date        =null;
            $current_package->package_active     =1;

             $package_info=array(
                'package_name'=>$request->package_name,
                'package_price'=>$request->package_price,
                'package_duration'=>$request->package_duration,
                'user_name'=>$user->name,

             );

            Mail::send(new PackagePurchase($user,$package_info));
            
            $current_package->save();
            $message=['status'=>200,'alert'=>'success','message'=>'Successfuly purchased package'];

             return json_encode($message);
           // dd($request->all());
    }
}


       