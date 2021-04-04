@extends('layouts.backend.app')
@section('title','Streamit | Add Language')
@section('content')
@include('admin.helper.success_error')
<div class="row">
   <div class="col-sm-12">
      <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">

               <h4 class="card-title">Add Language</h4>
            </div>
         </div>
         <div class="iq-card-body">
            <div class="row">
               <div class="col-lg-12">
                  <form action="{{ route('language.store') }}" method="post">
                  	@csrf
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="language_name">
                     </div>
                   
                     <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="javascript:history.back();" class="btn btn-danger">Back</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
	
@endsection

