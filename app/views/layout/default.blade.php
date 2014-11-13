<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::Kencana Indonesia Kreasi::.</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
		{{ HTML::style('css/skel.css') }}
		{{ HTML::style('css/style.css') }}
		{{ HTML::style('css/style-wide.css') }}
</head>
<?php
    // get the controller and the action
    $routeAction = Route::currentRouteAction();

    /*
     * this will strip controllerName@action to controllerName
     */
    $controllerName = substr($routeAction, 0, strpos($routeAction, '@'));
?>
<body {{ $controllerName === 'HomeController' ? 'class="landing"': '' }}>

	<!-- header -->
	@include('partials.header')

	<!-- Content -->
	@yield('content')

	<!-- footer -->	
	@include('partials.footer')
	

	<!-- le javascript -->


	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/jquery.dropotron.min.js') }}
	{{ HTML::script('js/jquery.scrollgress.min.js') }}
    {{ HTML::script('js/skel.min.js') }}
    {{ HTML::script('js/skel-layers.min.js') }}
    {{ HTML::script('js/jssor.js') }}
    {{ HTML::script('js/jssor.slider.min.js') }}
    {{ HTML::script('js/init.js') }}
</body>
</html>