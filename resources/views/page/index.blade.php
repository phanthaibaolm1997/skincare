@extends('page.master')
@section('content')

<div class="container-fluid main">
	<br>
	<h2 class="title-heading"> <i class="fa fa-caret-right" aria-hidden="true"></i> Sản phẩm</h2>
	<br>
	<div class="row">
		<div class="col-md-3">
			<div class="product">
				<div class="contain-image d-flex">
					<img src="https://static.wixstatic.com/media/7789f0_10b0851569ab40f59def6253a1d36bf3~mv2.jpg/v1/fill/w_420,h_420,al_c,lg_1,q_85/7789f0_10b0851569ab40f59def6253a1d36bf3~mv2.jpg" alt="" class="image-product">
				</div>
				<div class="price-product d-flex">
					<div class="flex-1 ">
						<h4 class="title-prod">Son 3CE Kem Cloud Lip Tint </h4>
						<h5 class="price-prod">299,000₫</h5>
					</div>
				</div>
				<div class="card-add ">
					<div class="row">
						<div class="col-md-6">
							<button class="btn button-pop">
								<i class="fa fa-shopping-cart icon-pop" aria-hidden="true"></i> Add card
							</button>
						</div>
						<div class="col-md-6">
							<button class="btn button-pop">
								<i class="fa fa-info icon-pop" aria-hidden="true"></i> View detail
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
<br/>
<div class="container">
	<div class="backtotop">
		<div class="up-btn" id="backTotop">Lên</div>
	</div>
</div>
@endsection