@if ($errors->any())  
@foreach ($errors->all() as $error)
 <div class="alert alert-primary" role="alert">
    <div class="iq-alert-text"> {{$error}}</div>
 </div>
@endforeach
@endif


@if (Session::has('error_message'))
<div class="alert alert-primary" role="alert">
   <div class="iq-alert-text"> {{Session::get('error_message')}}</div>
</div>
@endif

@if (Session::has('success_message'))
	<div class="alert alert-success" role="alert">
	   <div class="iq-alert-text"> {{Session::get('success_message')}}</div>
	</div>
@endif
