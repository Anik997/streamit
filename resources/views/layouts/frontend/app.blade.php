<!doctype html>
<html lang="en-US">

<head>
      <!-- Required meta tags -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>@yield('title')</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('assets/frontend/images/favicon.ico')}}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" />
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('assets/frontend/css/typography.css')}}">
      <!-- Style -->
      <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
      <!-- Responsive -->
      <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}" />
      <link rel="stylesheet" href="{{asset('assets/frontend/style/css/toastr.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style/css/custom.css')}}">


      @yield('css')

   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Header -->
      @include('layouts.frontend.inc.header')
      <!-- Header End -->
      <!-- Slider Start -->
      @yield('slider_section')
      <!-- Slider End -->
      <!-- MainContent -->
      <div class="main-content">
            @section('main')
            @show
      </div>
    @include('layouts.frontend.inc.footer')
      <!-- MainContent End-->
      <!-- back-to-top -->
      <div id="back-to-top">
         <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
      </div>
      <!-- back-to-top End -->
      <!-- jQuery, Popper JS -->
      <script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
      <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
      <!-- Bootstrap JS -->
      <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
      <!-- Slick JS -->
      <script src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
      <!-- owl carousel Js -->
      <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
      <!-- select2 Js -->
      <script src="{{asset('assets/frontend/js/select2.min.js')}}"></script>
      <!-- Magnific Popup-->
      <script src="{{asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Slick Animation-->
      <script src="{{asset('assets/frontend/js/slick-animation.min.js')}}"></script>
      <script src="{{asset('assets/frontend/style/js/toastr.js')}}"></script>
      <!-- Custom JS-->
      <script src="{{asset('assets/frontend/js/custom.js')}}"></script>
      <script src="{{asset('assets/frontend/style/js/custom.js')}}"></script>
      <script>
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
      </script>
      @yield('js')

        <script>// toster
            @if(Session::has('messege'))
              var type="{{Session::get('alert-type','info')}}"
              switch(type){
                  case 'info':
                       toastr.info("{{ Session::get('messege') }}");
                       break;
                  case 'success':
                      toastr.success("{{ Session::get('messege') }}");
                      break;
                  case 'warning':
                      toastr.warning("{{ Session::get('messege') }}");
                      break;
                  case 'error':
                      toastr.error("{{ Session::get('messege') }}");
                      break;
              }
            @endif
      </script>
   </body>

<!-- Mirrored from iqonic.design/themes/streamitnew/frontend/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Sep 2020 20:04:10 GMT -->
</html>