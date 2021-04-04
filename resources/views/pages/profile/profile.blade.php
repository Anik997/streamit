@extends('layouts.frontend.app')
@section('title','Streamit | Manage Profile')
@section('slider_section')

 
@endsection
@section('main')

   <section class="m-profile manage-p">
       <div class="container h-100">
           <div class="row align-items-center justify-content-center h-100">
               <div class="col-lg-10">
                   <div class="sign-user_card">
                       <div class="row">
                           <div class="col-lg-2">
                                <form class="mt-4" data-action="{{ route('update.profile') }}" id="update_profile_form" enctype="multipart/data-form">
                               <div class="upload_profile d-inline-block">
                               <img src="{{ (Auth::user()->avatar !=null) ? asset('assets/frontend/profile/'.Auth::user()->avatar) : asset('assets/frontend/profile/user.jpg')}}" class="profile-pic rounded-circle img-fluid" alt="user">
                               <div class="p-image">
                                   <i class="ri-pencil-line upload-button"></i>
                                   <input class="file-upload" type="file" accept="image/*" name="avatar">
                               </div>
                               </div>
                           </div>
                           <div class="col-lg-10 device-margin">
                               <div class="profile-from">
                                   <h4 class="mb-3">Manage Profile</h4>
                                   <div id="alert_section"></div>
                                 
                                       <div class="form-group">
                                           <label>Name</label>
                                           <input type="text" class="form-control mb-0" name="name" 
                                               required value="{{Auth::user()->name}}">
                                       </div>

                                       <div class="form-group">
                                           <label>Phone</label>
                                           <input type="text" class="form-control mb-0"
                                               name="phone" required value="{{Auth::user()->phone}}">
                                       </div>

                                       <div class="form-group">
                                           <textarea class="form-control" name="address" rows="2" cols="20" required="">{{Auth::user()->address}}</textarea>
                                       </div>
                                                                           
                                       <div class="d-flex">
                                           <button class="btn btn-hover" type="submit">Update</button>
                                           <a href="#" class="btn btn-link">Cancel</a>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
      
@endsection