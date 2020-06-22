@extends('layouts.cartmaster')
@section('content')

<h5 class="headcheck" style="font-size: 2em"><i class="fa fa-history" aria-hidden="true" ></i> Lịch sử mua hàng</h5>
<div class="container" style="min-height: 70vh">
	@if(Session::get('ss_kh_id') !== null)
	<ul class="timeline">
		@foreach($allHis as $his)
		<li>
			<a href="#">#CODE {{$his->dh_ma}} - {{$his->dh_ngaylap}}</a>
			<br/>
			
				@if( $his->dh_trangthai  == 0)
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onClick="showHistoryOrder({{$his}})" style="width: 200px">
					Chưa được xữ lý
				</button>
				@elseif($his->dh_trangthai  == 1)
					<button class="btn btn-success" data-toggle="modal" data-target="#myModal" onClick="showHistoryOrder({{$his}})" style="width: 200px">Đã được xữ lý</button>
				@else
				<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" onClick="showHistoryOrder({{$his}})" style="width: 200px">
					Đã bị hủy bỏ
				</button>
				@endif 
		</li>
		@endforeach
	</ul>
	@else
	<div>
		<h3 style="margin-top: 20vh" class="text-center">Vui lòng đăng nhập</h3>
		<p class="text-center"><a href="{{ route('login-kh') }}">Đăng nhập</a></p>
	</div>
	@endif
</div>
@endsection
<div id="myModal" class="modal fade" role="dialog" style="padding-left:0px !important;">
	<div class="modal-dialog" style="margin: 0px;float: right;width: 50%;max-width: 100%;">
		<div class="modal-content" style="height: 100vh">
			<div class="modal-header">
				<h5 class="card-title">Đơn hàng số # <span id="iddh"></span></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<h4 class="card-title text-center"> ĐƠN HÀNG</h4>
					</div>
					<div class="col-md-4"></div>
				</div>
				<div id="info1"></div>
				<div id="prod1"></div>
				<div id="total1"></div>
			</div>
		</div>
	</div>
</div>
