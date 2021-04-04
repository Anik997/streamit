@extends('layouts.backend.app')
@section('title','Streamit | Add Video')
@section('content')
@include('admin.helper.success_error')
<div class="row">
   <div class="col-sm-12">
      <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">

               <h4 class="card-title">Add Video</h4>
            </div>
         </div>
         <div class="iq-card-body">
            <div class="row">
               <div class="col-lg-12">
                  <form action="{{ route('type.store') }}" method="post">
                  	@csrf
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="type_name">
                     </div>
                     <div class="form-group">
                        <textarea id="text" name="description" rows="5" class="form-control"
                        placeholder="Description"></textarea>
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

