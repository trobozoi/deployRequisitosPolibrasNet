<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>@yield('title', 'Home Page')</title>
 
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
@yield('meta')
@section('style')
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
@show
	
	<!-- App -->
	<script>
window.App = window.App || {};
	App.siteURL = '{{ URL::to("/") }}';
	App.currentURL = '{{ URL::current() }}';
	App.fullURL = '{{ URL::full() }}';
	App.apiURL = '{{ URL::to("api") }}';
	App.assetURL = '{{ URL::to("assets") }}';
	</script>
 
	<!-- jQuery and Modernizr -->
	<script src="{{ asset('assets/js/modernizr.custom.21779.js') }}"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ URL::asset("assets/js/jquery-1.10.1.min.js") }}"><\/script>')</script>
@yield('script.header')
 
</head>
<body>
 
@yield('body')
@section('script.footer')
	<!-- Script Footer -->
	<script src="{{ asset('assets/js/underscore-min.js') }}"></script>
	<script src="{{ asset('assets/js/backbone-min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
 
	<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
g.src='//www.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
@show
        <div class="container">
			@if(Session::has('flash_message_success'))
				<div class="alert alert-success">{{Session::get('flash_message_success')}}</div>
			@endif
			@if(Session::has('flash_message_danger'))
				<div class="alert alert-danger"></div>
			@endif
			
			
            @yield('content')
        </div>
</body>
</html>