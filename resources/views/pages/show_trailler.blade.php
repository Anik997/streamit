@extends('layouts.frontend.app')
@section('title','Streamit | View Triller')
@section('slider_section')
@if (!is_null($trailler->trailler_name))
     <video class="video d-block" controls loop>
         <source src="{{asset('assets/backend/video/store/trailler/'.$trailler->trailler_name)}}" type="video/mp4">
      </video>
      @else
      <video class="video d-block" controls loop>
      </video>
       <p class="p-4 text-danger">Something went Wrong</p>
@endif
   
@endsection
@section('main')
<section class="movie-detail container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="trending-info season-info g-border">
            <h4 class="trending-text big-title text-uppercase mt-0">{{$trailler->name}}</h4>
            <div class="d-flex align-items-center text-white text-detail episode-name mb-0">
               <span>{{$trailler->category->category_name}}</span>
               <span class="trending-year">{{$trailler->title}}</span>
            </div>
            <p class="trending-dec w-100 mb-0">{{$trailler->description}}</p>
            <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
               <li><span><i class="ri-add-line"></i></span></li>
               <li><span><i class="ri-heart-fill"></i></span></li>
               <li class="share">
                  <span><i class="ri-share-fill"></i></span>
                  <div class="share-box">
                     <div class="d-flex align-items-center">
                        <a href="#" class="share-ico"><i class="ri-facebook-fill"></i></a>
                        <a href="#" class="share-ico"><i class="ri-twitter-fill"></i></a>
                        <a href="#" class="share-ico"><i class="ri-links-fill"></i></a>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</section>
<section id="iq-favorites">
   <div class="container-fluid">
      <div class="block-space">
         <div class="row">
            <div class="col-sm-12 overflow-hidden">
               <div class="iq-main-header d-flex align-items-center justify-content-between">
                  <h4 class="main-title">Latest Episodes</h4>
                  @if (count($more_trillers)>10)
                  <a href="show-single.html" class="text-primary">View all</a>
                  @endif
               </div>
            </div>
         </div>
         <div class="row">
            @if (count($more_trillers)>0)
            @foreach ($more_trillers as $more_triller)
            
            <div class="col-1-5 col-md-6 iq-mb-30">
               <div class="epi-box">
                  <div class="epi-img position-relative">
                     <img src="{{asset('assets/backend/video/store/thumbnail/small/'.$more_triller->thumbnail)}}" class="img-fluid img-zoom" alt="">
                     <div class="episode-number">{{$more_triller->trailler_view}}</div>
                     <div class="episode-play-info">
                        <div class="episode-play">
                           <a href="{{ route('show.trailler',$more_triller->slug) }}">
                              <i class="ri-play-fill"></i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="epi-desc p-3">
                     <div class="d-flex align-items-center justify-content-between">
                        <span class="text-white">{{date('d M Y',strtotime($more_triller->created_at))}}</span>
                        <span class="text-primary">{{$more_triller->duration}}</span>
                     </div>
                     <a href="{{asset('assets/backend/video/store/thumbnail/small/'.$more_triller->thumbnail)}}">
                        <h6 class="epi-name text-white mb-0">{{$more_triller->title}}
                        </h6>
                     </a>
                  </div>
               </div>
            </div>
             @endforeach
            @else
               <p>Nore more Related trailler</p>
             @endif
         </div>
      </div>
   </div>
</section>
      
@endsection