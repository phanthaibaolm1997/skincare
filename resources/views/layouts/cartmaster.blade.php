
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Single Page</title>
	<meta charset="UTF-8">
	<meta name="description" content="Instyle Fashion HTML Template">
	<meta name="keywords" content="instyle, fashion, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon"/>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}"/>
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}"/> --}}
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
	@include('page.layout.header')
	{{-- @include('layouts.elements.slider-single') --}}
	<section class="page-warp single-blog-page">
		<div class="container-fluid" style="width: 80%; margin: auto">
			@yield('content')
		</div>
	</section>
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

