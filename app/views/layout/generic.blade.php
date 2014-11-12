<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::Kencana Indonesia Kreasi::.</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--[if lte IE 8]>
	<script src="css/ie/html5shiv.js"></script>
	<![endif]-->
		<link rel="stylesheet" href="{{ asset('themes/css/skel.css') }}" />
		<link rel="stylesheet" href="{{ asset('themes/css/style.css')}}" />
		<link rel="stylesheet" href="{{ asset('themes/css/style-wide.css')}}" />
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

	<!-- header -->
	@include('partials.header2')

	<!-- Content -->
	@yield('content')

	<!-- footer -->	
	@include('partials.footer')
	

	<!-- le javascript -->
	<script src="{{ asset('themes/js/jquery.min.js')}}"></script>
	<script src="{{ asset('themes/js/jquery.dropotron.min.js')}}"></script>
	<script src="{{ asset('themes/js/jquery.scrollgress.min.js')}}"></script>
	<script src="{{ asset('themes/js/skel.min.js')}}"></script>
	<script src="{{ asset('themes/js/skel-layers.min.js')}}"></script>
	<script src="{{ asset('themes/js/init.js')}}"></script>
</body>
</html>