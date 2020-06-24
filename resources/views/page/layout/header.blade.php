<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark site-navbar">
			<a class="navbar-brand site-logo" href="index.html#">
				<h2><span>In</span>Style</h2>
				<p>Fashion Forward</p>
			</a>
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<!-- Main menu -->
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Sản phẩm</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="blog.html">Tin tức</a>
					</li>
					@if(Session::has('ss_kh_id'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('history') }}">PROFILE CÁ NHÂN</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('logout-khachhang') }}">Thoát</a>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login-kh') }}">Đăng nhập</a>
					</li>
					@endif                                                             
				</ul>
				<div class="social-links my-2 my-lg-0">
					<a href="{{ route('cart') }}" style="background-color: #c41739; padding: 10px 5px; border-radius: 50%;"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span> 10</span></a>
				</div>
			</div>
		</nav>
	</header>
	<!-- Header section end-->