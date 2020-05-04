@extends('layouts.single')
@section('content')
<div class="row">
	<div class="col-lg-3 sidebar">

		<div class="sb-widget">
			<form class="search-widget">
				<input type="text">
				<button type="submit">Search</button>
			</form>
		</div>

		<div class="sb-widget">
			<div class="categories-widget">
				<h2 class="sb-title">Danh mục sản phẩm</h2>
				<ul>
					<li><a href="#">Fashion</a></li>
					<li><a href="#">Lifestyle</a></li>
					<li><a href="#">Travel</a></li>
					<li><a href="#">Make up</a></li>
					<li><a href="#">Community</a></li>
					<li><a href="#">Uncategorized</a></li>
				</ul>
			</div>
		</div>

		<div class="sb-widget">
			<h2 class="sb-title">Sản phầm cùng loại</h2>
			<div class="populer-post">
				@foreach($recomProd as $recom)
				<div class="pp-item">
					<img src="{{ asset($recom->hinhanhhanghoa[0]->hinhanh->ha_url) }}" alt="" />
					<div class="pp-text">
						<div class="pp-meta">
							<span>Giá Bán: {{ number_format($recom->hh_dongia)}} đ</span>
						</div>
						<h5>{{ $recom->hh_ten }}</h5>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		
		<div class="sb-widget">
			<a href="#" class="add">
				<img src="img/add.jpg" alt="">
			</a>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="row">
			<div class="col-5">
				<div id="slider-image">
					@foreach($detailProd->hinhanhhanghoa as $pic)
					<img src="{{ asset($pic->hinhanh->ha_url) }}" alt="" width="100%">
					@endforeach
				</div>
				<br/>
				<div id="slider-image-nav">
					@foreach($detailProd->hinhanhhanghoa as $pic)
					<img src="{{ asset($pic->hinhanh->ha_url) }}" alt="" width="100%">
					@endforeach
				</div>
			</div>
			<div class="col-7">
				<div class="blog-head">
					<div class="blog-tags">{{ $detailProd->loaihang->ten_lh }}</div>
					<h2>{{ $detailProd->hh_ten }}</h2>
					<span>Giá Bán: {{ number_format($detailProd->hh_dongia) }} đ</span>
					<input type="number" value="1" id="quality" class="form-control mt-2 mb-2"  style="width: 50%"/>
					<button type="button" class="btn btn-info mb-3 cart" onclick=" @if(Session::has('ss_kh_id')) addCard('{!! url("/cart/add") !!}',{!! $detailProd->hh_ma !!}, document.getElementById('quality').value, {!! $detailProd->hh_dongia !!}, {{ Session('ss_kh_id')}}) @else checkLogin(); @endif">
						<i class="fa fa-shopping-cart"></i>
						Thêm vào giỏ
					</button>
					<p><b>Ngày nhập:</b> {{ $detailProd->created_at }}</p>
					<p><b>Loại hàng:</b> {{ $detailProd->loaihang->ten_lh }}</p>
					<p><b>Còn lại:</b> {{ $detailProd->hh_conlai }} sản phẩm</p>
				</div>
			</div>
		</div> 

		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Mô tả chi tiết sản phẩm</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#menu1"> <i class="fa fa-eercast" aria-hidden="true"></i> Đặc tính của sản phẩm</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane container active" id="home">
				<div style="width: 90%; margin: auto; text-align: justify;">
					{!! $detailProd->hh_mota !!}
				</div>
			</div>
			<div class="tab-pane container fade" id="menu1">
				<table class="table">
					<tbody>
						@foreach($detailProd->chitietdactinh as $ctdt)
						<tr>
							<td>{{$ctdt->dactinh->dt_ten}}</td>
							<td>{{$ctdt->thongso}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<h3 class="bc-title"><i class="fa fa-commenting-o" aria-hidden="true"></i> Để lại đánh giá</h3>
		<div class="blog-comments">
			<div class="star-rating">
			  <input type="radio" id="5-stars" class="numstart" name="rating" value="5" />
			  <label for="5-stars" class="star">&#9733;</label>
			  <input type="radio" id="4-stars" class="numstart" name="rating" value="4" />
			  <label for="4-stars" class="star">&#9733;</label>
			  <input type="radio" id="3-stars" class="numstart" name="rating" value="3" />
			  <label for="3-stars" class="star">&#9733;</label>
			  <input type="radio" id="2-stars" class="numstart" name="rating" value="2" />
			  <label for="2-stars" class="star">&#9733;</label>
			  <input type="radio" id="1-star" class="numstart" name="rating" value="1" />
			  <label for="1-star" class="star">&#9733;</label>
			</div>
			<form class="comment-form" method="POST" action="{{ route('post.danhgia') }}">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="star" id="getStar">
						<input type="hidden" name="id" value="{{ Request()->id }}">
						<textarea placeholder="Nhập bình luận của bạn..." name="binhluan"></textarea>
						@csrf
						<button class="site-btn sb-dark">Đánh giá <i class="fa fa-angle-double-right"></i></button>
					</div>
				</div>
			</form>
		</div>
		@foreach($comments as $cmt)
		<div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" width="100px" />
        	    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{ $cmt->khachhang->kh_ten }}</strong></a>
        	            @for($i = 1; $i <= $cmt->dg_star; $i++)
        	             <span class="float-right"> <i class="text-warning fa fa-star"></i></span>
        	            @endfor

        	       </p>
        	       <div class="clearfix"></div>
        	       <p style="font-size: 12px;"><strong>Ngày đánh giá: </strong>{{ $cmt->dg_ngaydg }}</p>
        	       <div class="clearfix"></div>
        	        <p>{{ $cmt->dg_noidung }}</p>
        	    </div>
	        </div>
	    </div>
	    @endforeach
	</div>
	
</div>
</div>
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.numstart').click(function(event) {
			let star = $(this).val();
			$('#getStar').val(star);
		});
	});
</script>
@endsection



