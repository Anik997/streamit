@extends('layouts.backend.app')
@section('title','Streamit | Edit Package')
@section('content')
<div id="alert_section"></div>
<div class="row">
   <div class="col-sm-12">
      <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">

               <h4 class="card-title">Edit Package</h4>
            </div>
         </div>
         <div class="iq-card-body">
            <div class="row">
               <div class="col-lg-12">
                  <form data-action="{{ route('admin.package.update') }}" method="post" id="update_package_form">
                    <input type="hidden" name="package_id" value="{{$package->id}}">
                  	@csrf
                     <div class="form-group">
                        <input type="text" class="form-control"  name="name" required="" value="{{$package->name}}">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control"  name="title" required="" value="{{$package->title}}">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control"  name="price" required="" value="{{$package->price}}">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control"  name="duration" required="" value="{{$package->duration}}">
                     </div>

                     <div class="form-group">
                       <textarea class="form-control" name="description" rows="5" cols="40" name="description" required="">{!!$package->description!!}</textarea>
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

@section('admin_js')

   <script>
    

     $(document).on('submit', '#update_package_form', function(e){
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

            $('#alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+response.responseJSON.errors['name'][0]+'</div>').show();
        }
      });
     });

   </script>
@endsection


