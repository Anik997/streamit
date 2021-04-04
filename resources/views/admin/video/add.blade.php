@extends('layouts.backend.app')
@section('title','Streamit | Add Video')
@section('content')
<div style="display: none" id="alert_section"> 
 
</div>
<div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Movie</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form data-action="{{ route('video.store') }}" id="video_upload_form" method="post" enctype="multipart/form-data">
                          @csrf
                           <div class="row">
                              <div class="col-lg-7">
                                 <div class="row">
                                    <div class="col-12 form-group">
                                       <input type="text" class="form-control"  value="{{ old('title') }}" placeholder="Title" name="title" required>
                                      
                                    </div>

                                    <div class="col-12 form-group">
                                       <input type="text" class="form-control"  value="{{ old('name') }}" placeholder="Name" name="name" required>
                                      
                                    </div>
                                    
                                   <div class="col-12 form-group" >
                                      <label id="gallery2" for="form_gallery-upload">Upload Thumbnail</label>
                                      <input data-name="#gallery2" id="form_gallery-upload" class="form_gallery-upload dropify changeVideoThumbnail"
                                         type="file"name="thumbnail" data-allowed-file-extensions="png jpg jpeg" required>

                                   </div>

                                   <div class="col-12 form_gallery form-group">
                                      <label id="gallery3" for="form_gallery-upload_thailler">Upload Trailler</label>
                                      <input data-name="#gallery3" id="form_gallery-upload_thailler" class="form_gallery-upload"
                                         type="file" name="trailler_video">
                                   </div>

                                   

                                    <div class="col-md-6 form-group">
                                       <select class="form-control" id="" name="category_id" required>
                                          <option value="">Video Category</option>
                                          @php
                                             $categories=App\Models\admin\Category::latest()->get();
                                          @endphp
                                          @foreach ($categories as $category)
                                             <option value="{{$category->id}}">{{$category->category_name}}</option>
                                          @endforeach
                                         
                                       </select>
                                      
                                    </div>
                                   <div class="col-md-6 form-group">
                                       <select class="form-control " name="type" required>
                                          <option value="">Market Type</option>
                                          <option value="Regular">Regular</option>
                                          <option value="Trending">Trending</option>
                                          <option value="Upcoming">Upcoming</option>
                                        
                                       </select>
                                      
                                    </div>

                                       <div class="col-md-6 form-group">
                                       <select class="form-control" id="" name="vedio_type" required>
                                          <option value="">Video Type</option>
                                          <option value="Movies">Movies </option>
                                          <option value="TV Shows">TV Shows</option>
                                        
                                       </select>
                                       
                                    </div>
                                    <div class="col-sm-6 form-group">
                                       <select class="form-control" name="quality" required>
                                          <option value="">Choose quality</option>
                                           <option value="Standard">Standard </option>
                                          <option value="Full HD">FULL HD</option>
                                          <option value="HD">HD</option>
                                          <option value="Quad HD">Quad HD</option>
                                       </select>
                                      
                                    </div>
                                    <div class="col-12 form-group">
                                       <textarea id="text" name="description" rows="5" class="form-control"
                                          placeholder="Description" required=""></textarea>
                                         
                                    </div>
                                 </div>
                              </div>

                              <div class="col-lg-5">
                               {{--  <div class="progress mb-3">
                                   <div class="progress-bar progress-bar-striped progress-bar-animated fill_progress_bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                </div> --}}
                                 <div>
                                  <span id="progress"></span>
                                </div>

                          
                                 <div class="d-block position-relative">
                                    <div class="form_video-upload">
                                       <input type="file" name="movie_tv" required  id="poster">
                                       <p>Upload video</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6 form-group">
                                 <input type="text" class="form-control" placeholder="Release year" name="release_year" required>
                               
                              </div>
                              <div class="col-sm-6 form-group">
                                 <select class="form-control" name="language_id" required>
                                    <option value="">Choose Language</option>
                                    @php 
                                       $languages=App\Models\admin\Language::latest()->get();
                                    @endphp
                                    @foreach ($languages as $language)
                                    <option value="{{$language->id}}">{{$language->language_name}}</option>
                                      @endforeach
                                 </select>
                               
                              </div>

                              <div class="col-sm-12 form-group">
                                 <input type="text" class="form-control" placeholder="Video Link (optional)" name="video_link">
                              </div>
                              <div class="col-12 form-group ">
                                 <button type="submit" class="btn btn-primary" id="upload_video_button">Upload</button>

                                 <button type="reset" class="btn btn-danger">cancel</button>
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
       $('.changeVideoThumbnail').dropify({
            messages: {
                'default': 'Drag & Drop a Trailler Thumbnail',
                'replace': 'Drag & Drop a Trailler Thumbnail',
            }  
        })

     $(document).on('submit', '#video_upload_form', function(e){

        e.preventDefault();

      let formDta = new FormData(this);
      $('#upload_video_button').text("Uploading...").prop('disabled',true);
      $.ajax({
        url: $(this).attr('data-action'),
        xhr: function() { // custom xhr (is the best)

                 var xhr = new XMLHttpRequest();
                 var total = 0;

                 // Get the total size of files
                 $.each(document.getElementById('poster').files, function(i, file) {
                        total += file.size;
                 });

                 // Called when upload progress changes. xhr2
                 xhr.upload.addEventListener("progress", function(evt) {
                        // show progress like example
                        var loaded = (evt.loaded / total).toFixed(1)*100; // percent

                        $('#progress').text('Uploading... ' + loaded + '%' );
                 }, false);

                 return xhr;
            },
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
         // $('.dropify-render img').attr('src','');
         // $('.dropify-render').css('background','black');
          $("#video_upload_form")[0].reset(); 
          $('#upload_video_button').text("Upload").prop('disabled',false);
         
        },
        error:function(response){
          console.log(response);

       // $.each(response.responseJSON.errors, function(key,value) {
            // $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
            // toastr.error(response.responseJSON.errors[key]);
         //}); 
          
        }
      });
     });

   </script>
@endsection
