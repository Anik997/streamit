<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Language;

class LanguageController extends Controller
{
    
    	function __construct(){
        	$this->middleware('auth:admin');
        }

        public function index(){
        	$languagees=Language::latest()->get();
        	return view('admin.language.index',compact('languagees'));
        }

        public function showForm(){
        	return view('admin.language.add');
        }

        public function store(Request $request){
        	$this->validate($request,[
        			'language_name'=>'required|unique:languages',
        	]);

        	$language=new Language();
        	$language->language_name=$request->language_name;
        	$language->save();
        	session()->flash('success_message','Language added Successfully');
        	return redirect()->back();

        }

        public function edit($id){
            $language=Language::findOrFail($id);
            return view('admin.language.edit',compact('language'));
        }

        public function update(Request $request){

                
                  $language=Language::findOrFail($request->language_id);
                  $this->validate($request,[
                          'language_name'=>'required|unique:languages,language_name,'.$language->id,
                  ]);
                $language->language_name=$request->language_name;
                $language->save();

                $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];

                return json_encode($notification);
        }

        public function delete(Request $request){
                   

                    $language=Language::findOrFail($request->language_id);
                    $language->delete();

                    $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];
                    return json_encode($notification);
        }

}
