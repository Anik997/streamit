<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>@yield('title')</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="https://iqonic.design/themes/streamitnew/dashboard/html/assets/images/favicon.ico" />
   
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/assets/css/bootstrap.min.css')}}">
   <!--datatable CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/assets/css/dataTables.bootstrap4.min.css')}}">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/assets/css/typography.css')}}">
   <!-- Style CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/assets/css/style.css')}}">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/assets/css/responsive.css')}}">
   
   <link rel="stylesheet" href="{{asset('assets/backend/style/css/dropify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/style/css/toastr.css')}}">
   <link rel="stylesheet" href="{{asset('assets/backend/style/css/style.css')}}">

   @yield('admin_css')
</head>
<body>
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>

   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar-->
      <div class="iq-sidebar">
          @include('layouts.backend.inc.sidebar')
      </div>
      <!-- TOP Nav Bar -->
      @include('layouts.backend.inc.header')
      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            @section('content')
            @show
         </div>

      </div>
   </div>
   <!-- Wrapper END -->
   <!-- Footer -->
   @include('layouts.backend.inc.footer')

   @yield('extra_html')
   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="{{asset('assets/backend/assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('assets/backend/assets/js/popper.min.js')}}"></script>
   <script src="{{asset('assets/backend/assets/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/backend/assets/js/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('assets/backend/assets/js/dataTables.bootstrap4.min.js')}}"></script>
   <!-- Appear JavaScript -->
   <script src="{{asset('assets/backend/assets/js/jquery.appear.js')}}"></script>
   <!-- Countdown JavaScript -->
   <script src="{{asset('assets/backend/assets/js/countdown.min.js')}}"></script>
   <!-- Select2 JavaScript -->
   <script src="{{asset('assets/backend/assets/js/select2.min.js')}}"></script>
   <!-- Counterup JavaScript -->
   <script src="{{asset('assets/backend/assets/js/waypoints.min.js')}}"></script>
   <script src="{{asset('assets/backend/assets/js/jquery.counterup.min.js')}}"></script>
   <!-- Wow JavaScript -->
   <script src="{{asset('assets/backend/assets/js/wow.min.js')}}"></script>
   <!-- Slick JavaScript -->
   <script src="{{asset('assets/backend/assets/js/slick.min.js')}}"></script>
   <!-- Owl Carousel JavaScript -->
   <script src="{{asset('assets/backend/assets/js/owl.carousel.min.js')}}"></script>
   <!-- Magnific Popup JavaScript -->
   <script src="{{asset('assets/backend/assets/js/jquery.magnific-popup.min.js')}}"></script>
   <!-- Smooth Scrollbar JavaScript -->
   <script src="{{asset('assets/backend/assets/js/smooth-scrollbar.js')}}"></script>
   <!-- apex Custom JavaScript -->
   <script src="{{asset('assets/backend/assets/js/apexcharts.js')}}"></script>
   <!-- Chart Custom JavaScript -->
   <script src="{{asset('assets/backend/assets/js/chart-custom.js')}}"></script>
   <!-- Custom JavaScript -->
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="{{asset('assets/backend/style/js/dropify.js')}}"></script>
    <script src="{{asset('assets/backend/style/js/dropify.more.js')}}"></script>
    <script src="{{asset('assets/backend/style/js/toastr.js')}}"></script>
    <script src="{{asset('assets/backend/style/js/sweet.js')}}"></script>
   <script src="{{asset('assets/backend/assets/js/custom.js')}}"></script>
   <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
   </script>
   @yield('admin_js')
   
</body>


</html>