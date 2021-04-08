 @extends('layouts.backend.app')
@section('title','Streamit | Manage Profile')
@section('content')
<div id="alert_section"></div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-body p-0">
                        <div class="iq-edit-list">
                           <ul class="iq-edit-profile d-flex nav nav-pills">
                              <li class="col-md-3 p-0">
                                 <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                    Personal Information
                                 </a>
                              </li>
                              <li class="col-md-3 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                 </a>
                              </li>
                             
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-edit-list-data">
                     <div class="tab-content">
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form  data-action="{{ route('admin.profile.update') }}" id="update_profile_form" method="post" enctype="multipart/form-data">
                                    <div class="form-group row align-items-center">
                                       <div class="col-md-12">
                                          <div class="profile-img-edit">
                                             <img class="profile-pic" src="{{asset('assets/backend/profile/'.Auth::user()->avatar)}}" alt="profile-pic">
                                             <div class="p-image">
                                                <i class="ri-pencil-line upload-button"></i>
                                                <input class="file-upload" type="file" accept="image/*"/ name="avatar">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class=" row align-items-center">
                                       <div class="form-group col-sm-6">
                                          <label for="fname">First Name:</label>
                                          <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                                       </div>
                                    
                                       <div class="form-group col-sm-6">
                                          <label for="uname">Email:</label>
                                          <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" readonly="">
                                       </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form data-action="{{ route('admin.password.update') }}" method="post" id="admin_password_change">
                                 	@csrf
                                    <div class="form-group">
                                       <label for="cpass">Current Password:</label>
                                       <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                       <input type="Password" class="form-control" name="cpass" required="">
                                    </div>
                                    <div class="form-group">
                                       <label for="npass">New Password:</label>
                                       <input type="Password" class="form-control" name="npass" required>
                                    </div>
                                    <div class="form-group">
                                       <label for="vpass">Verify Password:</label>
                                       <input type="Password" class="form-control" name="password_confirmation" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                      
                        
                     </div>
                  </div>
               </div>
            </div>
         
   

	
@endsection

@section('admin_js')

   <script>
    

     $(document).on('submit', '#update_profile_form', function(e){
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
          }        },
        error:function(response){
          console.log(response);

            $('#alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+response.responseJSON.errors['category_name'][0]+'</div>').show();
        }
      });
     });


     $(document).on('submit', '#admin_password_change', function(e){
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
            $('#alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+data.message+'</div>').show();
          }        },
        error:function(response){
          console.log(response);

            $('#alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+response.responseJSON.errors['category_name'][0]+'</div>').show();
        }
      });
     });

   </script>
@endsection

