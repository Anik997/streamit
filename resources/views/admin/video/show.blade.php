@extends('layouts.backend.app')
@section('title','Streamit | Video Details')
@section('content')
<div class="row">

   <div class="col-sm-5">

    <div class="iq-card">
      
       <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
             <h4 class="card-title">Basic Info</h4>
          </div>
       </div>
       <div class="iq-card-body">
        
          <ul class="list-group">
             <li class="list-group-item">Name <span class="float-right">{{$video->name}}</span></li>
             <li class="list-group-item">Title <span class="float-right">{{$video->title}}</span></li>
             <li class="list-group-item">Category <span class="float-right">{{$video->category->category_name}}</span></li>
              <li class="list-group-item">Language <span class="float-right">{{$video->language->language_name}}</span></li>
             <li class="list-group-item">Type <span class="float-right">{{$video->vedio_type}}</span></li>
            <li class="list-group-item">Quality <span class="float-right">{{$video->quality}}</span></li>
            <li class="list-group-item">Market Situation <span class="float-right">{{$video->type}}</span></li>
            <li class="list-group-item">Release Time <span class="float-right">{{$video->release_year}}</span></li>
             <li class="list-group-item">Duration <span class="float-right">{{$video->duration}}</span></li>
            
            <li class="list-group-item">Video Views <span class="float-right">{{$video->view}}</span></li>
            <li class="list-group-item">Triller Views <span class="float-right">{{$video->trailler_view}}</span></li>
            <h5>Description</h5>
            <li class="list-group-item">{!!$video->description!!}</span></li>


          </ul>
       </div>
    </div>
   </div>

   <div class="col-sm-7">
    <div class="iq-card">
      <div class="iq-card-header-toolbar d-flex align-items-center float-right">
         <a href="{{ route('video.index') }}" class="btn btn-primary">Back</a>
      </div>
       <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
             <h4 class="card-title">Media Info</h4>
          </div>
       </div>
       <div class="iq-card-body">
         
         <div style="width: 100%">
            <h5 class="pb-2">Uploaded Video</h5>
            <video class="video-area" controls>
              <source src="{{ asset('assets/backend/video/store/movie_tv_show/'.$video->video_name) }}" type="video/ogg">
             
            </video>
         </div>

         <div style="width: 100%">
            <h5 class="pb-2">Uploaded Triller</h5>
            <video class="video-area" controls>
              <source src="{{ asset('assets/backend/video/store/trailler/'.$video->trailler_name) }}" type="video/ogg">
             
            </video>
         </div>

          <div style="width: 100%">
            <h5 class="pb-2">Thumbnail</h5>
            <img src="{{ asset('assets/backend/video/store/thumbnail/small/'.$video->thumbnail) }}" class="img-border-radius avatar-40 img-fluid" alt="" style="width: 100%; height: 250px"></a>
         </div>
       </div>
    </div>
   </div>
</div>
        
	
@endsection
@section('admin_css')
   <style>
      .video-area{
         width: 100% !important;
         height: 250px;
      }
   </style>
@endsection

@section('admin_js')


@endsection
