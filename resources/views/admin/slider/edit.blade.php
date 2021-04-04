@extends('layouts.backend.app')
@section('title','Streamit | Slider Edit')
@section('content')
<div id="alert_section"></div>
@include('admin.helper.success_error')
<div class="row">
   <div class="col-sm-12">
      <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">

               <h4 class="card-title">Edit Slider</h4>
            </div>
         </div>
         <div class="iq-card-body">
            <div class="row">
               <div class="col-lg-8">
                 <form data-action="{{ route('slider.update') }}" method="post" id="update_slider_form" enctype="multipart/form-data">
                  	@csrf
                     <div class="form-group">
                        <input type="file" class="form-control dropify" name="slider_image" data-allowed-file-extensions="png jpg jpeg"  data-default-file="{{ asset('assets/backend/slider/'.$slider->slider_image) }}">
                     </div>
                     <input type="hidden" name="id" value="{{$slider->id}}">
                     <div class="form-group">
                       <select class="form-control" name="type">
                         <option {{$slider->type==1 ? 'selected' : ''}} value="1">Set Home Page</option>
                         <option {{$slider->type==2 ? 'selected' : ''}} value="2">Set Movie or TV Show</option>
                       </select>
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

@section('admin_css')
    <style>
      .dropify-wrapper{
            background: black !important;
            border:none;
          }
         .dropify-preview{
                background: black !important;
                border:none;
          }
    </style>
@endsection

@section('admin_js')

   <script>
    

     $(document).on('submit', '#update_slider_form', function(e){
        e.preventDefault();
      let formDta = new FormData(this);
      $.ajax({
        url: $(this).attr('data-action'),
        method: "POST",
        data: formDta,
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){
          let data=JSON.parse(response);
          if (data.status===200) {
            $('#alert_section').html('<div class="alert alert-success"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
          }else{
            $('#alert_section').html('<div class="alert alert-success"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
          }
        
         
         
        },
        error:function(response){
          console.log(response);

            
        }
      });
     });

   </script>
@endsection

