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

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}"/>
</head>
<body>
	@include('page.layout.header')
	@yield('content')
	@include('page.layout.footer')
	</body>
</html>
