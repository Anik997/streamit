@extends('layouts.backend.app')
@section('title','Streamit | Add Package')
@section('content')
<div id="alert_section"></div>
<div class="row">
   <div class="col-sm-12">
      <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">

               <h4 class="card-title">Add Package</h4>
            </div>
         </div>
         <div class="iq-card-body">
            <div class="row">
               <div class="col-lg-12">
                  <form data-action="{{ route('package.store') }}" method="post" id="add_package_form">
                  	@csrf
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" required="">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Title" name="title" required="">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Price" name="price" required="">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Duration" name="duration" required="">
                     </div>

                     <div class="form-group">
                       <textarea class="form-control" name="description" rows="5" cols="40" name="description" placeholder="Description" required=""></textarea>
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
    

     $(document).on('submit', '#add_package_form', function(e){
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
          $("#add_package_form")[0].reset(); 
         
         
        },
        error:function(response){
          console.log(response);

            $('#alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+response.responseJSON.errors['name'][0]+'</div>').show();
        }
      });
     });

   </script>
@endsection


