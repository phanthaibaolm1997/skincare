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
				<?php $percent = round($totalNum/$nextLKH->lkh_hanmuctien*100); ?>
				<p class="mb-1">Số tiền hiện tại <strong>{{ number_format($totalNum)}} đ</strong>, Level up ở <strong>{{ number_format($nextLKH->lkh_hanmuctien) }} đ</strong></p>				
				<div class="progress">
				  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percent }}%">{{ $percent }} %</div>
				</div>
				<span> </span>
			</div>
			<div class="profile-content">
				<h5>Bạn đang là khách hàng 
					<span class="badge badge-pill badge-warning p-2">{{ $getInfoKH->loaikhachhang->lkh_ten }}</span> Được tích
					<span class="badge badge-pill badge-warning p-2">{{ $getInfoKH->loaikhachhang->percent }} %</span> trên mổi đơn hàng 
				</h5>
				<div class="row">
					<div class="col-md-12">
						@if(Session::get('ss_kh_id') !== null)
					<h5 class="headcheck">Lịch sử đơn hàng</h5>
					@foreach($allHis as $his)
					<div class="hihihaha">
						<a href="#">#CODE {{$his->dh_ma}} - {{$his->created_at}}</a>
						<br/>

						@if( $his->dh_trangthai  == 0)
						<span class="text-warning">Đơn hàng đang chờ</span>
						<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal" onClick="showHistoryOrder({{$his}})" style="float: right;">
							Xem
						</button>
						@elseif($his->dh_trangthai  == 1)
						<span class="text-success">Đơn hàng thành công</span>
						<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal" onClick="showHistoryOrder({{$his}})" style="float: right;">Xem</button>
						@else
						<span class="text-danger">Đơn hàng bị hủy</span>
						<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal" onClick="showHistoryOrder({{$his}})" style="float: right;">
							Xem
						</button>
						@endif 
					</div>
					@endforeach
				@else
					</div>
					<div class="col-md-6">
					</div>
				</div>
				
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
