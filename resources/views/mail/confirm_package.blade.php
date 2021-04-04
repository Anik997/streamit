<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	

	<P> Dear {{$package_info['user_name']}},</P>
	<p>You have purchased {{$package_info['package_name']}} for  {{$package_info['package_duration']}} days by ৳  {{$package_info['package_price']}}. </p>
	<p>Your purchase proccess has been started at {{$package_info['start_date']}}. This package will be expired at {{$package_info['expire_date']}}.</p>
	<p>From now you can watch unlimited movies and TV show untill packahe is expired. Don't be lated. Let's start your favourite movies.</p>
	
	<a href="{{ route('home') }}" class="btn btn-success">Visit our website</a>
	 <H4>Thnak You</H4>

</body>
</html>