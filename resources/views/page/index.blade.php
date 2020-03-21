@extends('page.master')
@section('content')
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<div class="hs-item set-bg" data-setbg="img/slider/1.jpg" data-hash="slide-1">
			<div class="container">
				<h2>Style is forever</h2>
				<a href="#" class="site-btn">Read More <i class="fa fa-angle-double-right"></i></a>
			</div>
			<div class="next-hs set-bg" data-setbg="img/slider/2.jpg">
				<a href="#slide-2" class="nest-hs-btn">Next</a>
			</div>
		</div>
		<div class="hs-item set-bg" data-setbg="img/slider/2.jpg" data-hash="slide-2">
			<div class="container">
				<h2>Style is forever</h2>
				<a href="#" class="site-btn">Read More <i class="fa fa-angle-double-right"></i></a>
			</div>
			<div class="next-hs set-bg" data-setbg="img/slider/1.jpg">
				<a href="#slide-1" class="nest-hs-btn">Next</a>
			</div>
		</div>
	</div>
	<div class="hero-social-warp">
		<p>Follow us on Social MEdia</p>
		<div class="hero-social-links">
			<a href="#"><i class="fa fa-behance"></i></a>
			<a href="#"><i class="fa fa-dribbble"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-pinterest"></i></a>
		</div>
	</div>
</section>
<!-- Hero section end-->

<!-- Intro section -->
<section class="intro-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<img src="img/intro-img.jpg" alt="">
			</div>
			<div class="col-lg-7 intro-text">
				<span>Aenean quis velit pulvinar,</span>
				<h2>"I firmly believe that with the right footwear one can rule the world."</h2>
				<p>Aenean quis velit pulvinar, pellentesque neque vel, laoreet orci. Suspendisse potenti. Donec congue vel justo eget malesuada. In arcu justo, sagittis consequat pulvinar quis, pretium quis massa. Vestibulum nec nibh eu nisi rutrum iaculis. Pellentesque placerat sit amet leo in vestibu-lum. Suspendisse quam neque, rutrum vel scelerisque eu</p>
				<a href="#" class="site-btn sb-dark">Read More <i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
	</div>
</section>
<!-- Intro section end-->

<!-- Portfolio section -->
<section class="portfolio-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-7">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/1.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
			<div class="col-lg-3 col-md-5">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/2.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
			<div class="col-lg-5 col-md-12">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/3.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
			<div class="col-lg-6 col-md-12">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/4.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
			<div class="col-lg-3 col-sm-6">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/5.jpg" alt="">
					<h4>See More</h4>
				</a>
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/7.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
			<div class="col-lg-3 col-sm-6">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/6.jpg" alt="">
					<h4>See More</h4>
				</a>
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/8.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
			<div class="col-lg-3 col-sm-6">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/9.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
			<div class="col-lg-3 col-sm-6">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/10.jpg" alt="">
					<h4>See More</h4>
				</a>
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/11.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
			<div class="col-lg-6 col-md-12">
				<a href="portfolio.html" class="portfolio-item">
					<img src="img/portfolio/12.jpg" alt="">
					<h4>See More</h4>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- Portfolio section end-->

<!-- Blog section -->
<section class="blog-section spad">
	<div class="container">
		<div class="blog-slider owl-carousel">
			<div class="blog-item">
				<div class="blog-thumb set-bg" data-setbg="img/blog/1.jpg">
					<div class="blog-date">
						<h2>20</h2>
						<p>Jan</p>									
					</div>
				</div>
				<div class="blog-head">
					<div class="blog-tags">fashion, event, lifestyle</div>
					<h2><a href="single-blog.html">Our fashion App</a></h2>
				</div>
				<p>Aenean quis velit pulvinar, pellentesque neque vel, laoreet orci. Suspendisse po-tenti. Donec congue vel justo eget malesuada. In arcu justo, sagittis consequat pulvinar quis, pretium quis massa. Vestibulum nec nibh eu nisi rutrum iaculis. Pellentesque placerat sit amet leo in vestibulum. Suspendisse quam neque, rutrum vel scelerisque eu.</p>
			</div>
			<div class="blog-item">
				<div class="blog-thumb set-bg" data-setbg="img/blog/2.jpg">
					<div class="blog-date">
						<h2>20</h2>
						<p>Jan</p>									
					</div>
				</div>
				<div class="blog-head">
					<div class="blog-tags">fashion, event, lifestyle</div>
					<h2><a href="single-blog.html">Our fashion App</a></h2>
				</div>
				<p>Aenean quis velit pulvinar, pellentesque neque vel, laoreet orci. Suspendisse po-tenti. Donec congue vel justo eget malesuada. In arcu justo, sagittis consequat pulvinar quis, pretium quis massa. Vestibulum nec nibh eu nisi rutrum iaculis. Pellentesque placerat sit amet leo in vestibulum. Suspendisse quam neque, rutrum vel scelerisque eu.</p>
			</div>
			<div class="blog-item">
				<div class="blog-thumb set-bg" data-setbg="img/blog/3.jpg">
					<div class="blog-date">
						<h2>20</h2>
						<p>Jan</p>									
					</div>
				</div>
				<div class="blog-head">
					<div class="blog-tags">fashion, event, lifestyle</div>
					<h2><a href="single-blog.html">Our fashion App</a></h2>
				</div>
				<p>Aenean quis velit pulvinar, pellentesque neque vel, laoreet orci. Suspendisse po-tenti. Donec congue vel justo eget malesuada. In arcu justo, sagittis consequat pulvinar quis, pretium quis massa. Vestibulum nec nibh eu nisi rutrum iaculis. Pellentesque placerat sit amet leo in vestibulum. Suspendisse quam neque, rutrum vel scelerisque eu.</p>
			</div>
		</div>
	</div>
</section>
<!-- Blog section end-->

<!-- Back to top -->
<div class="container">
	<div class="backtotop">
		<div class="up-btn" id="backTotop">UP</div>
	</div>
</div>
@endsection