@extends('layouts.frontend.app')
@section('title','Streamit | All Trillers')
@section('slider_section')
   <section class="banner-wrapper overlay-wrapper iq-main-slider"  >
      <div class="banner-caption">
         <div class="position-relative mb-4">
            <a href="{{ route('show.trailler',$latest->slug) }}" class="d-flex align-items-center">
               <div class="play-button">
                  <i class="fa fa-play"></i>
               </div>
               <h4 class="w-name text-white font-weight-700">Watch latest Episode</h4>
            </a>
         </div>
         <ul class="list-inline p-0 m-0 share-icons music-play-lists">
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
   </section>
@endsection
@section('main')

<section class="movie-detail container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="trending-info g-border">
            <h1 class="trending-text big-title text-uppercase mt-0">{{$latest->name}}</h1>
            <ul class="p-0 list-inline d-flex align-items-center movie-content">
               <li class="text-white">{{$latest->category->category_name}}</li>
               <li class="text-white">{{$latest->vedio_type}}</li>
            </ul>
            <div class="d-flex align-items-center text-white text-detail">
               <span class="badge badge-secondary p-3">{{$latest->trailler_view}}</span>
               <span class="ml-3">{{$latest->duration}}</span>
               <span class="trending-year">{{$latest->release_year}}</span>
            </div>
            <div class="d-flex align-items-center series mb-4">
               <a href="javascript:void();"><img src="{{asset('assets/frontend/images/trending/trending-label.png')}}" class="img-fluid"
                     alt=""></a>
               <span class="text-gold ml-3">#{{$latest->language->language_name}}</span>
            </div>
            <p class="trending-dec w-100 mb-0">{{$latest->description}}</p>
         </div>
      </div>
   </div>
</section>
<section class="container-fluid seasons">
 
  
     <div class="iq-main-header d-flex align-items-center justify-content-between mt-2">
         <h4 class="main-title">Thillers</h4>
      </div>
   
   <div class="tab-content">
      <div id="episodes" class="tab-pane fade active show" role="tabpanel">
         <div class="block-space">
            <div class="row">
               @foreach ($traillers as $trailler)
                <div class="col-1-5 col-md-6 iq-mb-30">
                  <div class="epi-box">
                     <div class="epi-img position-relative">
                        <img src="{{asset('assets/backend/video/store/thumbnail/small/'.$trailler->thumbnail)}}" class="img-fluid img-zoom" alt="">
                        <div class="episode-number">1</div>
                        <div class="episode-play-info">
                           <div class="episode-play">
                              <a href="{{ route('show.trailler',$trailler->slug) }}">
                                 <i class="ri-play-fill"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="epi-desc p-3">
                        <div class="d-flex align-items-center justify-content-between">
                           <span class="text-white">{{date('d M Y',strtotime($trailler->created_at))}}</span>
                           <span class="text-primary">{{$trailler->duration}}</span>
                        </div>
                        <a href="show-details.html">
                           <h6 class="epi-name text-white mb-0">{{$trailler->title}}
                           </h6>
                        </a>
                     </div>
                  </div>
                </div>
              @endforeach
            </div>
         </div>
      </div>
   </div>
</section>


      
@endsection