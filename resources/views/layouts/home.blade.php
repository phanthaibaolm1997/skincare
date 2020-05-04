@extends('layouts.master')
@section('content')
<div class="container-fluid main">
	<br>
	<h2 class="title-heading"> <i class="fa fa-caret-right" aria-hidden="true"></i> SẢN PHẨM MỚI NHẤT</h2>
	<div class="row">
		@foreach($newProd as $prod)
		<div class="col-md-2">
			<div class="product">
				<div class="contain-image d-flex">
					<img src="{{ asset($prod->hinhanhhanghoa[0]->hinhanh->ha_url) }}" class="img-product-avt" alt="" />
				</div>
				<div class="price-product">

					<h4 class="title-prod text-one-line">{{ $prod->hh_ten }}</h4>
					<h5 class="price-prod">{{ number_format($prod->hh_dongia) }} đ</h5>
				</div>
				<div class="card-add ">
					
					<div class="row">
						<div class="col-md-6">
							<button class="btn button-pop" onclick="
								@if(Session::has('ss_kh_id'))
								ajaxAddToCart('{!! url("/cart/add") !!}',{!! $prod->hh_ma !!}, 1, {!! $prod->hh_dongia !!}, {{ Session('ss_kh_id')}})
								@else
								ajaxAddToCart('{!! url("/cart/add") !!}',{!! $prod->hh_ma !!}, 1, {!! $prod->hh_dongia !!}, 1)
								@endif">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</button>
						</div>
						<div class="col-md-6">
							<a href="{{ url('/product-detail') }}/{{$prod->hh_ma}}">
								<button class="btn button-pop">
									<i class="fa fa-info" aria-hidden="true"></i> 
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<br/>
<div class="category-tab container-fluid" style="width: 90%"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs" style="padding: 10px 0px; background-color: #262626;">
			@foreach($getProdOfCat as $cat)
			<li {!! $loop->iteration == "1"? 'class="active"' : null!!} style="padding: 10px; border-right: 1px solid #545151; ">
				<a href="#type{{$loop->iteration}}" data-toggle="tab" style="color: #fff;">{{ $cat->ten_lh }}</a>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="tab-content" style="padding: 5px 30px">
		@foreach($getProdOfCat as $cat)
		<div class="tab-pane fade {!! $loop->iteration == "1"? 'active show' : null !!} in" id="type{{$loop->iteration}}" >
			<div class="row"> 
				@foreach($cat->hanghoa as $prodCat)
				<div class="col-sm-2 product">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<div style="background: #afadad40;display: flex;align-items: center;">
									<img src="{{ asset($prodCat->hinhanhhanghoa[0]->hinhanh->ha_url) }}" alt="" class="img-product-avt" />
								</div>
								<h5>{{ number_format($prodCat->hh_dongia)}}</h5>
								<p class="textoneline">{{ $prodCat->hh_ten }}</p>
								<button class="btn btn-default " onclick="
								@if(Session::has('ss_kh_id'))
								ajaxAddToCart('{!! url("/cart/add") !!}',{!! $prodCat->hh_ma !!}, 1, {!! $prodCat->hh_dongia !!}, {{ Session('ss_kh_id')}})
								@else
								ajaxAddToCart('{!! url("/cart/add") !!}',{!! $prodCat->hh_ma !!}, 1, {!! $prodCat->hh_dongia !!}, 1)
								@endif
								">
								<i class="fa fa-shopping-cart"></i> Thêm
							</button>
							<a href="{{ url('/product-detail') }}/{{$prodCat->hh_ma}}">
								<button class="btn btn-default">								
									<i class="fa fa-info"></i> Xem
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endforeach	
</div>
</div><!--/category-tab-->
<br/>
<div class="container-fluid" style="width: 90%">
	<br>
	<h2 class="title-heading"> <i class="fa fa-caret-right" aria-hidden="true"></i> Tin tức</h2>
	<div class="row">
		@foreach($getAllTinTuc as $post)
		<div class="col-md-2">
			<div class="product">
				<div class="contain-image d-flex">
					<img src="{{ asset($post->tin_avatar) }}" class="img-product-avt" alt="" />
				</div>
				<div class="price-product">
					<h4 class="title-prod text-one-line">{{ $post->tin_ten }}</h4>
					<h5 class="price-prod">{{ number_format($post->nhanvien->nv_hoten) }} đ</h5>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<br/>
<div class="recommended_items" style="width: 90%"><!--recommended_items-->
	<h2 class="title text-center">Sản phẩm ngẫu nhiên</h2>
	<div id="randProd">
		@foreach($randProd as $rprod)
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<div style="height: 250px; overflow: hidden; background: #afadad40;display: flex;align-items: center;">
						<img src="{{ asset($rprod->hinhanhhanghoa[0]->hinhanh->ha_url) }}" alt="" />
					</div>
					<h5>{{ number_format($rprod->hh_dongia)}}</h5>
					<p class="textoneline">{{ $rprod->hh_ten }}</p>
					<button class="btn btn-default " onclick=" @if(Session::has('ss_kh_id')) ajaxAddToCart('{!! url("/cart/add") !!}',{!! $rprod->hh_ma !!}, 1, {!! $rprod->hh_dongia !!}, {{ Session('ss_kh_id')}}) @else checkLogin(); @endif">
						<i class="fa fa-shopping-cart"></i> Thêm
					</button>
					<a href="{{ url('/product-detail') }}/{{$rprod->hh_ma}}">
						<button class="btn btn-default">								
							<i class="fa fa-info"></i> Xem
						</button>
					</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection

<script type="text/javascript">
	function ajaxAddToCart(url, idProd, quality, price, userId) {
		$.ajax({
			type: "GET",
			url: url,
			data: {
				idProd: idProd,
				quality: quality,
				price: price,
				userId: userId
			},
			success: function(data) {
				alert('Thêm sản phẩm thành công!')
			}
		});
	}
	function checkLogin() {
		alert('Bạn vui lòng đăng nhập để thực hiện thao tác!');
	}
</script>
