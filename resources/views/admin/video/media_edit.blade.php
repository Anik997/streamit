@extends('layouts.backend.app')
@section('title','Streamit | Update Media Info')
@section('content')
<div style="display: none" id="alert_section"> 
 
</div>
<div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Update Basic Info</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form data-action="{{ route('update.media_info') }}" id="media_info_update" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$item->id}}">
                          @csrf
                           <div class="row">
                              <div class="col-lg-7">
                                 <div class="row">
                                   <div class="col-12 form-group" >
                                      <label id="gallery2" for="form_gallery-upload">Upload Thumbnail</label>
                                      <input data-name="#gallery2" id="form_gallery-upload" class="form_gallery-upload dropify changeVideoThumbnail"
                                         type="file"name="thumbnail" data-allowed-file-extensions="png jpg jpeg"  data-default-file="{{ asset('assets/backend/video/store/thumbnail/small/'.$item->thumbnail) }}">

                                   </div>

                                   <div class="col-12 form_gallery form-group">
                                      <label id="gallery3" for="form_gallery-upload_thailler">Upload Trailler</label>
                                      <input data-name="#gallery3" id="form_gallery-upload_thailler" class="form_gallery-upload"
                                         type="file" name="trailler_video">
                                   </div>

                                 </div>
                              </div>

                              <div class="col-lg-5">
                                 <div class="d-block position-relative">
                                    <div class="form_video-upload">
                                       <input type="file" name="movie_tv" id="poster">
                                       <p>Upload video</p>
                                    </div>
                                 </div>
                              </div>


                           </div>
                           <div class="row">
                              <div class="col-12 form-group ">
                                 <button type="submit" class="btn btn-primary" id="upload_video_button">Upload</button>

                                  <a href="javascript:history.back();" class="btn btn-danger">Back</a>
                              </div>
                           </div>
                        </form>
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
     
     $(document).on('submit', '#media_info_update', function(e){

        e.preventDefault();

      let formDta = new FormData(this);
      $('#upload_video_button').text("Updating...").prop('disabled',true);
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
        
         
          $('#upload_video_button').text("Upload").prop('disabled',false);
         
        },
        error:function(response){
          console.log(response);

          $('#alert_section').html('<div class="alert alert-primary"> <i class="fas fa-check-circle"></i>'+response.responseJSON.errors['name'][0]+'</div>').show();
          $('#upload_video_button').text("Upload").prop('disabled',false);
          
        }
      });
     });

   </script>
@endsection
