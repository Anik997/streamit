@extends('layouts.frontend.app')
@section('title','Streamit | Detail View')
@section('slider_section')
@php
   date_default_timezone_set("Asia/Dhaka");
   $check_package=App\Models\PurchasePackage::where('user_id',Auth::user()->id)->first();

  $today=strtotime(date('Y-m-d H:i:s'));
  if (!is_null($check_package)) {
       $expire_day=strtotime($check_package->expire_date);
  }

@endphp
@if (is_null($check_package))
<div class="container" style="padding-top: 80px">
   <div class="col-sm-12">
      <div class="iq-card">
         <div class="iq-card-body">
            <div class="row">
               
               <div class="col-sm-12 col-lg-12">
                  <div class="alert alert-danger" role="alert">
                     <div class="iq-alert-text">
                        <h5 class="alert-heading">Dear valuable Customer</h5>
                        <p>You did not purchase any package yet. So this Vedio is not available for. Please Purchase your preperable package <a href="{{ route('show.package') }}"><strong style="color: blue">Click here to purchase package</strong></a> to watch this vedio.</p>
                        <hr>
                       <p>Yor can only see triller for this movie. <a href="{{ route('show.trailler',$movie_tv->slug) }}"><strong style="color: blue">Click here to see the triller</strong></a></p>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   @else
   @if ($check_package->package_active==1)
      <div class="container" style="padding-top: 80px">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-body">
                  <div class="row">
                     
                     <div class="col-sm-12 col-lg-12">
                        <div class="alert alert-danger" role="alert">
                           <div class="iq-alert-text">
                              <h5 class="alert-heading">Dear valuable Customer</h5>
                              <p>your purchase package did not activated yet.Very soon we will active your purchase package. Please don't be annoyed. Keep with us.</p>
                              <hr>
                             <p>Yor can only see triller for this movie. <a href="{{ route('show.trailler',$movie_tv->slug) }}"><strong style="color: blue">Click here to see the triller</strong></a></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
         @else
         @if ($today > $expire_day)
            <div class="container" style="padding-top: 80px">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="row">
                           
                           <div class="col-sm-12 col-lg-12">
                              <div class="alert alert-danger" role="alert">
                                 <div class="iq-alert-text">
                                    <h5 class="alert-heading">Dear valuable Customer</h5>
                                    <p>Your purchased package time has beeb expired. Please Update your package or contuct with us. <a href=""><strong style="color: blue">Check here to update package</strong></a></p>
                                    <hr>
                                   <p>Yor can only see triller for this movie. <a href="{{ route('show.trailler',$movie_tv->slug) }}"><strong style="color: blue">Click here to see the triller</strong></a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
               @else
               <video class="video d-block" controls loop>
                   <source src="{{asset('assets/backend/video/store/movie_tv_show/'.$movie_tv->video_name)}}" type="video/mp4">
                </video>
         @endif
   @endif
@endif

@endsection
@section('main')
<section class="movie-detail container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="trending-info g-border">
            <h1 class="trending-text big-title text-uppercase mt-0">{{$movie_tv->name}}</h1>
            <ul class="p-0 list-inline d-flex align-items-center movie-content">
               <li class="text-white">{{$movie_tv->category->category_name}}</li>
               <li class="text-white">{{$movie_tv->vedio_type}}</li>
               <li class="text-white">{{$movie_tv->quality}}</li>
            </ul>
            <div class="d-flex align-items-center text-white text-detail">
               <span class="badge badge-secondary p-3">{{$movie_tv->view}}+</span>
               <span class="ml-3">{{$movie_tv->duration}}</span>
               <span class="trending-year">{{$movie_tv->release_year}}</span>
            </div>
            <div class="d-flex align-items-center series mb-4">
               <a href="javascript:void();"><img src="images/trending/trending-label.png" class="img-fluid"
                     alt=""></a>
               <span class="text-gold ml-3"># {{$movie_tv->language->language_name}}</span>
            </div>
            <p class="trending-dec w-100 mb-0">{{$movie_tv->description}}</p>
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
<section id="iq-favorites" class="s-margin">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
               <h4 class="main-title">More Like This</h4>
                @if (count($more_likes)>4)
               <a href="movie-category.html" class="text-primary">View all</a>
               @endif
            </div>
            <div class="favorites-contens">
               <ul class="list-inline favorites-slider row p-0 mb-0">
                  @if (count($more_likes)>0)
                    
                  @foreach ($more_likes as $more_like)
                     {{-- expr --}}
                 
                  <li class="slide-item">
                     <a href="{{ route('movie.show.detail',$more_like->slug) }}">
                        <div class="block-images position-relative">
                           <div class="img-box">
                              <img src="{{asset('assets/backend/video/store/thumbnail/small/'.$more_like->thumbnail)}}" class="img-fluid" alt="">
                           </div>
                           <div class="block-description">
                              <h6>{{$more_like->name}}</h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <div class="badge badge-secondary p-1 mr-2">{{$more_like->view}}</div>
                                 <span class="text-white">{{$more_like->duration}}</span>
                              </div>
                              <div class="hover-buttons">
                                 <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play
                                    Now</span>
                              </div>
                           </div>
                           <div class="block-social-info">
                              <ul class="list-inline p-0 m-0 music-play-lists">
                                 <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                 <li><span><i class="ri-heart-fill"></i></span></li>
                                 <li><span><i class="ri-add-line"></i></span></li>
                              </ul>
                           </div>
                        </div>
                     </a>
                  </li>
                   @endforeach
                  @else
                  <p>No More related Videos</p>
                  @endif
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="iq-upcoming-movie">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
               <h4 class="main-title">Upcoming Movies</h4>
               @if (count($upcommings)>4)
               
               <a href="movie-category.html" class="text-primary">View all</a>
               @endif
            </div>
            <div class="upcoming-contens">
               <ul class="favorites-slider list-inline  row p-0 mb-0">
                  @if (count($upcommings))
                  @foreach ($upcommings as $upcomming)
                     {{-- expr --}}
                  
                  <li class="slide-item">
                     <a href="{{ route('movie.show.detail',$more_like->slug) }}">
                        <div class="block-images position-relative">
                           <div class="img-box">
                              <img src="{{asset('assets/backend/video/store/thumbnail/small/'.$upcomming->thumbnail)}}" class="img-fluid" alt="">
                           </div>
                           <div class="block-description">
                              <h6>{{$upcomming->name}}</h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <div class="badge badge-secondary p-1 mr-2">{{$upcomming->view}}+</div>
                                 <span class="text-white">{{$upcomming->duration}}</span>
                              </div>
                              <div class="hover-buttons">
                                 <span class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                    Play Now
                                 </span>
                              </div>
                           </div>
                           <div class="block-social-info">
                              <ul class="list-inline p-0 m-0 music-play-lists">
                                 <li><span><i class="ri-volume-mute-fill"></i></span></li>
                                 <li><span><i class="ri-heart-fill"></i></span></li>
                                 <li><span><i class="ri-add-line"></i></span></li>
                              </ul>
                           </div>
                        </div>
                     </a>
                  </li>
                  @endforeach
                  @else
                  <p>No upcomming video is found</p>
                  @endif
                
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>

      
@endsection