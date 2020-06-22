{{-- <!doctype html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="Tabs are used to split content between multiple sections. Wide variety available.">
	<meta name="msapplication-tap-highlight" content="no">
	<link href="{{ asset('assets/admin/main.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-drawer/1.0.6/css/bootstrap-drawer.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

	<style type="text/css">
		.gallery{margin-top: 10px;
			background: #fafafa; padding: 10px;}
		.gallery img{
			height: 200px;
			margin-right: 5px;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
		<div class="app-header header-shadow">
			<div class="app-header__logo">
				<div class="logo-src"></div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
				<span>
					<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
						<span class="btn-icon-wrapper">
							<i class="fa fa-ellipsis-v fa-w-6"></i>
						</span>
					</button>
				</span>
			</div>    
			<div class="app-header__content">
				<div class="app-header-right">
					<div class="header-btn-lg pr-0">
						<div class="widget-content p-0">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="btn-group">
										<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
											<img width="42" class="rounded-circle" src="{{ asset('assets/admin/images/avatars/1.jpg') }}" alt="">
											<i class="fa fa-angle-down ml-2 opacity-8"></i>
										</a>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<a href="{{ route('logout')}}"><button type="button" tabindex="0" class="dropdown-item">Thoát</button></a>
										</div>
									</div>
								</div>
								<div class="widget-content-left  ml-3 header-user-info">
									<div class="widget-heading">
									   {{ Session('ss_nv_email')}}
									</div>
								</div>
								
							</div>
						</div>
					</div>        
				</div>
			</div>
		</div>             
		<div class="app-main">
				<div class="app-sidebar sidebar-shadow">
					<div class="app-header__logo">
						<div class="logo-src"></div>
						<div class="header__pane ml-auto">
							<div>
								<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</button>
							</div>
						</div>
					</div>
					<div class="app-header__mobile-menu">
						<div>
							<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
					<div class="app-header__menu">
						<span>
							<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
								<span class="btn-icon-wrapper">
									<i class="fa fa-ellipsis-v fa-w-6"></i>
								</span>
							</button>
						</span>
					</div>    
					<div class="scrollbar-sidebar">
						@include('admin.elements.menu')
					</div>
				</div>    
				<div class="app-main__outer">
					@yield('content')
					   
				</div>
		</div>
	</div>
<script type="text/javascript" src="{{ asset('assets/admin/scripts/main.js') }}"></script>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-drawer/1.0.6/js/drawer.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/admin/scripts/admin.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

</body>
</html>
--}}
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		ADMIN - QUẢN LÝ SHOP....
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{ asset('assets1/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets1/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
	<link href="{{ asset('assets1/demo/demo.css')}}" rel="stylesheet"/>
	<link href="{{ asset('assets1/style.css')}}" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

</head>
<body class="">
	<div class="wrapper ">
		<div class="sidebar" data-color="white" data-active-color="danger">
			<div class="logo">
				<a href="https://www.creative-tim.com" class="simple-text logo-mini">
					<div class="logo-image-small">
						<img src="{{ asset('assets1/img/logo-small.png')}}">
					</div>
				</a>
				<a href="https://www.creative-tim.com" class="simple-text logo-normal">
					BÀ ++7 SHOP
				</a>
			</div>
			<div class="sidebar-wrapper">
				@include('admin.elements.menu')
			</div>
		</div>
		<div class="main-panel">
			<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
				<div class="container-fluid">
					<div class="navbar-wrapper">
						<div class="navbar-toggle">
							<button type="button" class="navbar-toggler">
								<span class="navbar-toggler-bar bar1"></span>
								<span class="navbar-toggler-bar bar2"></span>
								<span class="navbar-toggler-bar bar3"></span>
							</button>
						</div>
						<a class="navbar-brand" href="javascript:;">Paper Dashboard 2</a>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navigation">
						<form>
							<div class="input-group no-border">
								<input type="text" value="" class="form-control" placeholder="Search...">
								<div class="input-group-append">
									<div class="input-group-text">
										<i class="nc-icon nc-zoom-split"></i>
									</div>
								</div>
							</div>
						</form>
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link btn-magnify" href="javascript:;">
									<i class="nc-icon nc-layout-11"></i>
									<p>
										<span class="d-lg-none d-md-block">Stats</span>
									</p>
								</a>
							</li>
							<li class="nav-item btn-rotate dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-bell-55"></i>
									<p>
										<span class="d-lg-none d-md-block">Some Actions</span>
									</p>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link btn-rotate" href="javascript:;">
									<i class="nc-icon nc-settings-gear-65"></i>
									<p>
										<span class="d-lg-none d-md-block">Account</span>
									</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="content" style="min-height: calc(100vh - 100px)">
				@yield('content')
			</div>
		</div>
	</div>
	<script src="{{ asset('assets1/js/core/jquery.min.js')}}"></script>
	<script src="{{ asset('assets1/js/core/popper.min.js')}}"></script>
	<script src="{{ asset('assets1/js/core/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets1/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
	<script src="{{ asset('assets1/js/plugins/chartjs.min.js')}}"></script>
	<script src="{{ asset('assets1/js/plugins/bootstrap-notify.js')}}"></script>
	<script src="{{ asset('assets1/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>
	<script src="{{ asset('assets1/demo/demo.js')}}"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
			demo.initChartsPages();
		});
	</script>
	@yield('script')
</body>

</html>