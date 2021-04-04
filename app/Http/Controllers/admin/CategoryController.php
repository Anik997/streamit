<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
	function __construct(){
    	$this->middleware('auth:admin');
    }

    public function index(){
    	$categories=Category::latest()->get();
    	return view('admin.category.index',compact('categories'));
    }
    public function getCategory(){
    	return DataTables::of(Category::query())->make(true);
    }

    public function showForm(){
    	return view('admin.category.add');
    }

    public function store(Request $request){
    	$this->validate($request,[
    			'category_name'=>'required|unique:categories',
    			'description'=>'required'
    	]);

    	$category=new Category();
    	$category->category_name=$request->category_name;
    	$category->description=$request->description;
    	$category->save();
    	session()->flash('success_message','Category added Successfully');
    	return redirect()->back();

    }
    public function edit($id){
            $category=Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request){

             // dd($request->all());
              $category=Category::findOrFail($request->category_id);
              $this->validate($request,[
                      'category_name'=>'required|unique:categories,category_name,'.$category->id,
              ]);
            $category->category_name=$request->category_name;
            $category->description=$request->description;

            $category->save();

            $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];

            return json_encode($notification);
    }


    public function delete(Request $request){

            $category=Category::findOrFail($request->category_id);
            $category->delete();

            $notification=['alert'=>'success','message'=>'Successfully Updated','status'=>200];
            return json_encode($notification);

        }

}
