<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Package;
use Str;
use App\Models\PurchasePackage;
use DateTime;
use DateTimezone;
use App\Models\User;
use Mail;
use App\Mail\PackageConfirm;

class PackageController extends Controller
{
    
    	function __construct(){
        	$this->middleware('auth:admin');
        }

        public function index(){
        	$packages=Package::latest()->get();
        	return view('admin.package.index',compact('packages'));
        }


    public function showForm(){
    	return view('admin.package.add');
    }

        public function store(Request $request){
        	//dd($request->all());
        	$this->validate($request,[
        			'name'=>'required|unique:packages',
        	]);

        	$package=new Package();
        	$package->name=$request->name;
        	$package->title=$request->title;
        	$package->price=$request->price;
        	$package->duration=$request->duration;
        	$package->description=$request->description;
        	

	       $save=$package->save();
    		if (!is_null($save)) {
                $notification=['alert'=>'success','message'=>'Package added successfully','status'=>200];

            }else{
                 $notification=['alert'=>'error','message'=>'Something went wrong','status'=>500];
            }
        return json_encode($notification);
    
        }

        public function all_purchase_package(){

            $purchases=PurchasePackage::latest()->get();
            return view('admin.package.all_purchase_package',compact('purchases'));
        }

        public function change_purchase_package(Request $request){
            date_default_timezone_set("Asia/Dhaka");
            
            $purchase=PurchasePackage::findOrFail($request->purchase_id);
            $package =Package::findOrFail($purchase->package_id);
            $user    =User::findOrFail($purchase->user_id);

            $start_date=date('d F Y h:i:s a');
            
            if (is_null($purchase->remain_time)) {
                $expire_date=date('d F Y h:i:s a',strtotime($package->duration.'days'));
            }else{
              
                $expire_date=date('d F Y h:i:s a',strtotime($purchase->remain_time+$package->duration.'days'));
            }

            $package_info = array(
                'start_date'      => $start_date,
                'expire_date'     => $expire_date,
                'package_name'    =>$package->name,
                'package_title'   =>$package->title,
                'package_duration'=>$package->duration,
                'package_price'   =>$package->price,
                'user_name'       =>$user->name,
        );

            Mail::send(new PackageConfirm($user,$package_info));
            $purchase->start_date=$start_date;
            $purchase->expire_date=$expire_date;
            if ($purchase->package_active==1) {
                $purchase->package_active=2;
            }else{
                 $purchase->package_active=1;
            }
            $purchase->remain_time=null;
            $purchase->save();


             $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];

             return json_encode($notification);
            
        }

        public function edit($id){

                $package=Package::findOrFail($id);
                return view('admin.package.edit',compact('package'));
        }

        public function update(Request $request){
                    //dd($request->all());
                    $package=Package::findOrFail($request->package_id);
                    $this->validate($request,[
                            'name'=>'required|unique:packages,name,'.$package->id,
                    ]);
                  $package->name=$request->name;
                  $package->title=$request->title;
                  $package->duration=$request->duration;
                  $package->price=$request->price;
                  $package->description=$request->description;
                  $package->save();

                  $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];

                  return json_encode($notification);
        }

        public function delete(Request $request){

                   // dd($request->all());

                $package=Package::findOrFail($request->package_id);
                $package->delete();

                $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];
                return json_encode($notification);

            }
}
