@extends('layouts.frontend.app')
@section('title','Streamit | All Movies')
@section('slider_section')
<section class="iq-main-slider p-0">
   <div id="tvshows-slider">

      @php
         $sliders=App\Models\admin\Slider::where('type','2')->latest()->get();
      @endphp
      @if (count($sliders))
       @foreach ($sliders as $slider)
      <div>
         <a href="movie-details.html">
            <div class="shows-img">
               <img src="{{asset('assets/backend/slider/'.$slider->slider_image)}}" class="w-100" alt="">
               <div class="shows-content">
                  <h4 class="text-white mb-1">Open Dead Shot</h4>
                  <div class="movie-time d-flex align-items-center">
                     <div class="badge badge-secondary p-1 mr-2">13+</div>
                     <span class="text-white">2h 20m</span>
                  </div>
               </div>
            </div>
         </a>
      </div>
       @endforeach
    @endif
             
   </div>
   <div class="dropdown genres-box">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
         Genres
      </button>
      <div class="dropdown-menu three-column" aria-labelledby="dropdownMenuButton">
         @php
            $languages=App\Models\admin\Language::all();
         @endphp
         @if (!is_null($languages))
            @foreach ($languages as $language)
               <a class="dropdown-item" href="{{ route('all.tv.show',$language->id) }}/lang">{{$language->language_name}}</a>
             @endforeach
            @endif


            @php
                $categories=App\Models\admin\Category::all();
            @endphp
           @if (!is_null($categories))
            @foreach ($categories as $category)
              <a class="dropdown-item" href="{{ route('all.tv.show',$category->id) }}/cat">{{$category->category_name}}</a>
            @endforeach
          @endif
        
      </div>
   </div>
</section>
 
@endsection
@section('main')

<section id="iq-favorites">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
               <h4 class="main-title">Movies List</h4>
            </div>
            <div class="favorites-contens">
               <ul class="favorites-slider list-inline  row p-0 mb-0">
                  @if (count($tv_shows)>0)
            
                  @foreach ($tv_shows as $tv_show)
                    
        
                  <li class="slide-item">
                     <a href="{{ route('movie.show.detail',$tv_show->slug) }}">
                        <div class="block-images position-relative">
                           <div class="img-box">
                              <img src="{{asset('assets/backend/video/store/thumbnail/small/'.$tv_show->thumbnail)}}" class="img-fluid" alt="">
                           </div>
                           <div class="block-description">
                              <h6>{{$tv_show->name}}</h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <div class="badge badge-secondary p-1 mr-2">{{$tv_show->view}}</div>
                                 <span class="text-white">{{$tv_show->duration}}</span>
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
                  <p>No Movie Found</p>
                     @endif

               </ul>
            </div>
         </div>
      </div>
   </div>
</section>


      
@endsection