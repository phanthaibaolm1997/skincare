@extends('layouts.cartmaster')
@section('content')

<div class="container-fluid content">
	<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<p class="text-center"><img src="" alt="" width="100px" height="100px"></p>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<h5>{{$getInfoKH->kh_ten}}</h5>
					</div>
					<div class="profile-usertitle-job">
						<span class="badge badge-pill badge-info p-2"> {{ $getInfoKH->loaikhachhang->lkh_ten }}</span>
					</div>
				</div>

				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<div class="profile-usermenu sidebar-sticky">
					<ul class="nav flex-column">
						<li class="active nav-item">
							<a href="#" class="nav-link active">
								<i class="fa fa-home"></i>
								{{$getInfoKH->kh_diachi}}
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://codepen.io/jasondavis/pen/jVRwaG?editors=1000">
								<i class="fa fa-user"></i>
								{{$getInfoKH->kh_sdt}} 
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" target="_blank">
								<i class="fa fa-check"></i>
								{{$getInfoKH->email}}
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fa fa-flag"></i>
								{{$getInfoKH->kh_ngaysinh}}
							</a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
			<div class="card p-2">
				<p class="text-right mb-0">Số Coin: <span class="badge badge-pill badge-warning p-2">{{ $getInfoKH->kh_coin }}</span></p>
			</div>
			<div class="profile-content">

				@if(Session::get('ss_kh_id') !== null)
				<ul class="timeline">
					@foreach($allHis as $his)
					<li class="mb-3">
						<a href="#">#CODE {{$his->dh_ma}} - {{$his->created_at}}</a>
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
		</div>
	</div>
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
