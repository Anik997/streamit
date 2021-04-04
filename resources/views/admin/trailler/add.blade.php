@extends('layouts.backend.app')
@section('title','Steamit | Trailler List')
@section('content')
@include('admin.helper.success_error')
<div class="row">
   <div class="col-sm-12">
      <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
               <h4 class="card-title">Add Trailler</h4>
            </div>
         </div>
         <div class="iq-card-body">
            <form action="{{ route('trailler.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="col-lg-7">
                     <div class="row">
                        <div class="col-12 form-group">
                           <input type="text" class="form-control" placeholder="Title" name="title">
                        </div>
                        <div class="col-12 form-group" >
                           <label id="gallery2" for="form_gallery-upload">Upload Thumbnail</label>
                           <input data-name="#gallery2" id="form_gallery-upload" class="form_gallery-upload dropify changeThumbnail"
                              type="file"name="thumbnail" data-allowed-file-extensions="png jpg jpeg">
                        </div>
                      
                        
                        <div class="col-12 form-group">
                           <textarea id="text" name="description" rows="5" class="form-control"
                              placeholder="Description"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5">
                     <div class="d-block position-relative">
                        <div class="form_video-upload">
                           <input type="file" name="trailler_video">
                           <p>Upload Thrailler</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 form-group ">
                     <button type="submit" class="btn btn-primary">Submit</button>
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
      border:none !important;
   }
   .dropify-preview{
      background: black !important
   }
</style>
@endsection
@section('admin_js')
   <script>
       $('.changeThumbnail').dropify({
            messages: {
                'default': 'Drag & Drop a Trailler Thumbnail',
                'replace': 'Drag & Drop a Trailler Thumbnail',
            }  
        })

   </script>
@endsection

