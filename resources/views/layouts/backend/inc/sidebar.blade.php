
 <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="{{ route('dashboard') }}" class="header-logo">
               <img src="{{asset('assets/backend/assets/images/logo.png')}}" class="img-fluid rounded-normal" alt="">
               <div class="logo-title">
                  <span class="text-primary text-uppercase">Streamit</span>
               </div>
            </a>
            <div class="iq-menu-bt-sidebar">
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
               </div>
            </div>
         </div>
         <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
               <ul id="iq-sidebar-toggle" class="iq-menu">
                  <li class="{{(Request::routeIs('dashboard')) ? 'active' : ''}}"><a href="{{ route('dashboard') }}" class="iq-waves-effect"><i class="las la-home iq-arrow-left"></i><span>Dashboard</span></a></li>
                 
                  
                  <li class="{{(Request::routeIs(['all.purchase.package'])) ? 'active' : ''}}"><a href="{{route('all.purchase.package')}}" class="iq-waves-effect"><i class="las la-user-friends"></i><span>Purchase Packages</span></a></li>

                   <li class="{{(Request::routeIs(['package.index','package.add'])) ? 'active' : ''}}" ><a href="{{ route('package.index') }}" class="iq-waves-effect"><i class="ri-price-tag-line"></i><span>Package</span></a></li>

                  <li class="{{(Request::routeIs(['category.index','category.add'])) ? 'active' : ''}}">
                     <a href="#category" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-list-ul"></i><span>Category</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{(Request::routeIs('category.add')) ? 'active' : ''}}"><a href="{{ route('category.add') }}"><i class="las la-user-plus"></i>Add Category</a></li>
                        <li class="{{(Request::routeIs(['category.index'])) ? 'active' : ''}}"><a href="{{ route('category.index') }}"><i class="las la-eye"></i>Category List</a></li>
                     </ul>
                  </li>

                

{{-- 
                  <li class="{{(Request::routeIs(['type.index','type.add'])) ? 'active' : ''}}">
                     <a href="#type" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-list-ul"></i><span>Vedio Type</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="type" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{(Request::routeIs('type.add')) ? 'active' : ''}}"><a href="{{ route('type.add') }}"><i class="las la-user-plus"></i>Add Type</a></li>
                        <li class="{{(Request::routeIs(['type.index'])) ? 'active' : ''}}"><a href="{{ route('type.index') }}"><i class="las la-eye"></i>Type List</a></li>
                     </ul>
                  </li> --}}


              {{--     <li class="{{(Request::routeIs(['trailler.index','trailler.add'])) ? 'active' : ''}}">
                     <a href="#trailler" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-list-ul"></i><span>Vedio Trailler</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="trailler" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{(Request::routeIs('trailler.add')) ? 'active' : ''}}"><a href="{{ route('trailler.add') }}"><i class="las la-user-plus"></i>Add Trailler</a></li>
                        <li class="{{(Request::routeIs(['trailler.index'])) ? 'active' : ''}}"><a href="{{ route('trailler.index') }}"><i class="las la-eye"></i>Trailler List</a></li>
                     </ul>
                  </li>
 --}}
                  <li class="{{(Request::routeIs(['video.index','video.add'])) ? 'active' : ''}}">
                     <a href="#videos" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-list-ul"></i><span>Movie and TV Shows</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="videos" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{(Request::routeIs('video.add')) ? 'active' : ''}}"><a href="{{ route('video.add') }}"><i class="las la-user-plus"></i>Add Video</a></li>
                        <li class="{{(Request::routeIs(['video.index'])) ? 'active' : ''}}"><a href="{{ route('video.index') }}"><i class="las la-eye"></i>Video List</a></li>
                     </ul>
                  </li>

                    <li class="{{(Request::routeIs(['language.index','language.add'])) ? 'active' : ''}}">
                     <a href="#language" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-list-ul"></i><span>Language</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="language" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{(Request::routeIs('language.add')) ? 'active' : ''}}"><a href="{{ route('language.add') }}"><i class="las la-user-plus"></i>Add Language</a></li>
                        <li class="{{(Request::routeIs(['language.index'])) ? 'active' : ''}}"><a href="{{ route('language.index') }}"><i class="las la-eye"></i>Language List</a></li>
                     </ul>
                  </li>


                  <li class="{{(Request::routeIs(['slider.index','slider.edit'])) ? 'active' : ''}}"><a href="{{route('slider.index')}}" class="iq-waves-effect"><i class="las la-user-friends"></i><span>Manage Sliders</span></a></li>

                  <li class="{{(Request::routeIs(['contact.index'])) ? 'active' : ''}}"><a href="{{route('contact.index')}}" class="iq-waves-effect"><i class="las la-user-friends"></i><span>Contact Massage</span></a></li>
              
               

               </ul>
            </nav>
         </div>