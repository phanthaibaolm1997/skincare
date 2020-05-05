@extends('layouts.single')
@section('content')
<div class="row">
	<div class="col-lg-3 sidebar">
		<div class="sb-widget">
			<div class="categories-widget">
				<h2 class="sb-title">Danh mục</h2>
				<ul>
					@foreach($getAllType as $type)
						<li><a href="{{ url('/category') }}/{{ $type->ma_lh }}">{{ $type->ten_lh }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="sb-widget">
			<h2 class="sb-title">Tin tức</h2>
			<div class="populer-post">
				@foreach($recomPost as $recom)
				<div class="pp-item">
					<img src="{{ asset($recom->tin_avatar) }}" alt="" />
					<div class="pp-text">
						<h5><a href="{{ url('tin-tuc') }}/{{ $recom->tin_ma }}">{{ $recom->tin_ten }}</a></h5>
						<div class="pp-meta">
							<span>{{ $recom->created_at }}</span>
						</div>
						
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
			<div class="col-md-12" style="height: 300px">
				<img src="{{ asset( $getDetailPost->tin_avatar) }}" alt="" style="object-fit: cover; width: 100%; height: 300px">
			</div>

			<div class="col-md-12">
				<br/>
				<h2>{{ $getDetailPost->tin_ten }}</h2>
				<br/>
				<small><strong>Ngày đăng:</strong> {{ $getDetailPost->created_at }}</small>
				<br/>
				<small><strong>Đăng bởi:</strong> {{ $getDetailPost->nhanvien->nv_hoten }}</small>
			</div>
			<hr/>
			<div class="col-md-12" style="text-align: justify;">
				{!! $getDetailPost->tin_noidung !!}
			</div>
		</div> 
	</div>
</div>
@endsection
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>




