<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

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
    
}
