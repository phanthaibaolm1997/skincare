@extends('admin.admin')
@section('content')

<div class="container-fluid">
	<div class="main-card card">
		<div class="card-body" style="background-color: #59afec;">
			<div class="d-flex">
				<h5 class="text-white">My name - {{ $infoKH->kh_ten }}</h5>
			</div>
		</div> 
	</div>

	<div class="mainf">
		<div class="row">
			<div class="col-md-4">
				<div class="main-card card">
					<div class="card-body">
						<h5>THÔNG TIN CÁ NHÂN</h5>
						<div class="ml-5">
							<table class="table table-borderless infoKH">
								<tbody>
									<tr>
										<th>Họ Tên: </th>
										<td>{{ $infoKH->kh_ten }}</td>
									</tr>
									<tr>
										<th>Ngày Sinh: </th>
										<td>{{ $infoKH->kh_ngaysinh }}</td>
									</tr>
									<tr>
										<th>Địa chỉ: </th>
										<td>{{ $infoKH->kh_diachi }}</td>
									</tr>
									<tr>
										<th>Liên Hệ: </th>
										<td>{{ $infoKH->kh_sdt }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="main-card card">
					<div class="card-body">
						<h5>THÔNG TIN CẤP ĐỘ</h5>
						<div class="ml-5 ">
							<div class="progress">
								<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
							</div>
							<p class="mt-3">Cấp độ Hiện tại: {{$infoKH->loaikhachhang->lkh_ten}}</p>
							<p class="mt-3">Cấp độ Tiếp theo: {{$infoKH->loaikhachhang->lkh_ten}}</p>
							<p class="mt-3">Số Tiền Đã Thanh Toán: {{$infoKH->loaikhachhang->lkh_ten}}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="main-card card">
					<div class="card-body" style="background-color: #61d497;">
						<h5 class="text-white">ĐƠN HÀNG ĐÃ THANH TOÁN</h5>
					</div> 
				</div>
				<div class="main-card card">
					<div class="card-body">
						<ul class="timeline">
							@foreach($infoKH->donhang as $dh)
							<li>
								<a target="_blank" href="https://www.totoprayogo.com/#">CODE ORDER #{{ $dh->dh_ma }}</a>
								<a href="#" class="float-right">{{ $dh->created_at }}</a>
								<p class="mt-3 mb-0">Số Sản Phẩm <strong>{{ count($dh->chitietdonhang) }} sản phẩm</strong></p>
								<?php $tien = 0; ?>
								@foreach($dh->chitietdonhang as $ctdh)
								<?php $tien += $ctdh->ctdh_soluong*$ctdh->hanghoa->hh_dongia; ?>
								@endforeach
								<p>Trị giá đơn: <strong>{{ number_format($tien) }} đ</strong></p>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="main-card card">
					<div class="card-body" style="background-color: #61d497;">
						<h5 class="text-white">GIỎ HÀNG</h5>
					</div> 
				</div>
				<div class="main-card card">
					<div class="card-body" style="min-height: 400px">
						@if(count($infoKH->giohang) > 0)
							@foreach($infoKH->giohang as $gh)
								
									@foreach($gh->chitietgiohang as $ctgh)
								<div class="card-body mb-3">
									<div class="row">
										<div class="col-md-4">
											<img src="{{ asset($ctgh->hanghoa->hinhanhhanghoa[0]->hinhanh->ha_url)}}" style="width: 80px; height: 80px; border:2px solid #61d497; object-fit: cover;">
										</div>
										<div class="col-md-5">
											<h6 style="">{{$ctgh->hanghoa->hh_ten}}</h6>
										</div>
										<div class="col-md-3">
											<h6>{{$ctgh->ctgh_soluong}}/đv</h6>
										</div>
									</div>
								</div>
									@endforeach
								
							@endforeach
						@else
						<h4 class="text-center text-danger">EMPTY CART</h4>
						@endif
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection

@section('script')
<script  type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	});
</script>
@endsection
