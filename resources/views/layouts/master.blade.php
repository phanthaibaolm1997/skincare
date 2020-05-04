<!DOCTYPE html>
<html lang="vi">
<head>
	<title>SKIN CARE</title>
	<meta charset="UTF-8">
	<meta name="description" content="Instyle Fashion HTML Template">
	<meta name="keywords" content="instyle, fashion, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon"/>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{ asset('styles.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}"/>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}"/>
</head>
<body>
	@include('page.layout.header')
	@include('page.layout.slider')
	@yield('content')
	@include('page.layout.footer')

	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/price-range.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.prettyPhoto.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<script src="{{ asset('assets/js/slick.min.js') }}"></script>
	<script src="{{ asset('assets/js/select2.min.js') }}"></script>
	<script src="{{ asset('assets/js/config.js')}}"></script> 

	
</body>
</html>
