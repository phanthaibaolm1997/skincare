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
	<link href="{{ asset('assets/css/price-range.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
	@include('page.layout.header')
	@include('layouts.elements.slider-single')
	<section class="page-warp single-blog-page">
		<div class="container-fluid" style="width: 80%; margin: auto">
			@yield('content')
		</div>
	</section>
	@include('page.layout.footer')


	<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/price-range.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
	<script src="{{ asset('assets/js/rangeslider.min.js') }}"></script>
	<script src="{{ asset('assets/js/config-single.js') }}"></script>
	<script src="{{ asset('assets/js/config.js') }}"></script>
	<script src="{{ asset('assets/js/select2.min.js') }}"></script>
	
</body>
</html>
