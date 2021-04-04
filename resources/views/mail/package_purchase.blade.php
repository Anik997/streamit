<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	

	<P> Dear {{$package_info['user_name']}},</P>
	<p>You have purchased {{$package_info['package_name']}} for  {{$package_info['package_duration']}} days by ৳  {{$package_info['package_price']}}. </p>
	<p>Very Your purchased package will be activated. You will be inform through email.</p>
	
	<a href="{{ route('home') }}" class="btn btn-success">Visit our website</a>
	 <H4>Thnak You</H4>

</body>
</html>