@extends('admin.admin')
@section('content')

<div class="card-body">
	<div class="row">
		<div class="col-md-9">
			<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
				<li class="nav-item">
					<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
						<span>Đơn hàng chư duyệt</span>
					</a>
				</li>
				<li class="nav-item">
					<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
						<span>Đơn hàng đã duyệt</span>
					</a>
				</li>
				<li class="nav-item">
					<a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
						<span>Đơn hàng đã hủy</span>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
					<div class="main-card card container-fluid" style="height: calc(100vh - 250px) !important;">
						<h5 class="pt-3 pb-3">ĐƠN HÀNG CHƯA XỮ LÝ</h5>
						@if (Session::has('success'))
						<div class="alert alert-success">                   
							<p>{!! Session::get('success') !!}</p>
						</div>
						@endif
						@if (Session::has('error'))
						<div class="alert alert-danger">                   
							<p>{!! Session::get('error') !!}</p>
						</div>
						@endif

						<table class="table table-hover table-borderless table-striped" id="myTable">
							<thead>
								<tr>
									<th>STT</th>
									<th>CODE</th>
									<th><span class="card-title">Tên khách</span></th>
									<th><span class="card-title">Ngày đặt</span></th>
									<th><span class="card-title">Số sản phẩm</span></th>
									<th><span class="card-title">Phương thức thanh toán</span></th>
									<th><span class="card-title">Thao tác</span></th>
								</tr>
							</thead>
							<tbody>
								@foreach($allOrder as $order)
								<tr>
									<td>
										<span style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">
											{{ $loop->iteration}}
										</span>
									</td>
									<td style="font-weight: bold">#{{ $order->dh_ma}}</td>
									<td style="font-weight: bold">{{ $order->khachhang->kh_ten}}</td>
									<td>{{ $order->created_at }}</td>
									<td>{{ count($order->chitietdonhang) }} sản phẩm</td>
									<td><span class="p-3 badge badge-warning text-white">{{ $order->pttt->pttt_ten }}</span> </td>
									<td> 
										<button class="btn btn-info" data-toggle="modal" data-target="#view{{$order->dh_ma}}">Xem chi tiết</button>
										<button class="btn btn-primary" data-toggle="modal" data-target="#check{{$order->dh_ma}}">Xữ lý</button>
										{{-- Modal --}}
										<div id="view{{$order->dh_ma}}" class="modal fade" role="dialog">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="main-card card">
														<div class="card-body" style="background-color: #59afec;">
															<div class="d-flex">
																<h5 style="flex: 1; line-height: 45px; color: #fff;">XEM CHI TIẾT ĐƠN: #{{ $order->dh_ma }}</h5>
															</div>
														</div>
													</div>
													<div class="modal-body">
														<h5 class="text-center">THÔNG TIN ĐƠN HÀNG</h5>
														<h6>Người đặt: {{ $order->khachhang->kh_ten}}</h6>
														<h6>Ngày đặt: {{ $order->dh_ngaylap}}</h6>
														<br/>
														<table class="table">
															<thead>
																<tr>
																	<th>STT</th>
																	<th>Tên</th>
																	<th>SL</th>
																	<th>Giá</th>
																	<th>Thành Tiền</th>
																</tr>
															</thead>
															<tbody>
																<?php $total = 0; ?>
																@foreach($order->chitietdonhang as $ctdh)
																<tr>
																	<td>1</td>
																	<td>{{ $ctdh->hanghoa->hh_ten }}</td>
																	<td>{{ $ctdh->ctdh_soluong }}</td>
																	<td>{{ number_format($ctdh->hanghoa->hh_dongia) }} đ</td>
																	<td>{{ number_format($ctdh->hanghoa->hh_dongia*$ctdh->ctdh_soluong) }} đ</td>
																</tr>
																<?php $total += ($ctdh->hanghoa->hh_dongia*$ctdh->ctdh_soluong); ?>
																@endforeach
															</tbody>
															<tfoot>
																<tr>
																	<th colspan="5">Tổng cộng: {{ number_format($total) }} đ</th>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>
											</div>
										</div>
										{{-- Modal --}}
										<div id="check{{$order->dh_ma}}" class="modal fade" role="dialog">
											<div class="modal-dialog modal-dialog-centered modal-lg">
												<div class="modal-content">
													<div class="main-card card">
														<div class="card-body" style="background-color: #59afec;">
															<div class="d-flex">
																<h5 style="flex: 1; line-height: 45px; color: #fff;">DUYỆT ĐƠN MS: #{{ $order->dh_ma }}</h5>
															</div>
														</div>
													</div>
													<div class="modal-body">
														<form method="POST" action="{{ route('order.checkout') }}">
															<div class="d-flex">
																<div style="flex: 1">
																	<select class="form-control" name="status">
																		<option value="1">DUYỆT ĐƠN HÀNG</option>
																		<option value="2">KHÔNG CHẤP NHẬN</option>
																	</select>
																	<input type="hidden" name="id" value="{{ $order->dh_ma }}">
																	@csrf

																</div>
																<div style="flex-basis: 50px"></div>
																<div style="flex-basis: 50px">
																	<button type="submit" class="btn btn-info">Ok</button>
																</div>
															</div>
														</form>
														<table class="table table-bordered">
															<thead>
																<tr>
																	<th>STT</th>
																	<th>Tên</th>
																	<th>SL</th>
																	<th>Giá</th>
																	<th>Thành Tiền</th>
																</tr>
															</thead>
															<tbody>
																<?php $total = 0; ?>
																@foreach($order->chitietdonhang as $ctdh)
																<tr>
																	<td>1</td>
																	<td>{{ $ctdh->hanghoa->hh_ten }}</td>
																	<td>{{ $ctdh->ctdh_soluong }}</td>
																	<td>{{ number_format($ctdh->hanghoa->hh_dongia) }} đ</td>
																	<td>{{ number_format($ctdh->hanghoa->hh_dongia*$ctdh->ctdh_soluong) }} đ</td>
																</tr>
																<?php $total += ($ctdh->hanghoa->hh_dongia*$ctdh->ctdh_soluong); ?>
																@endforeach
															</tbody>
															<tfoot>
																<tr>
																	<th colspan="5">Tổng cộng: {{ number_format($total) }} đ</th>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>
											</div>
										</div>
									</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
					<div class="main-card card container-fluid" style="height: calc(100vh - 250px) !important;">
						<h5 class="pt-3 pb-3">ĐƠN HÀNG THÀNH CÔNG</h5>
						<table class="table table-hover table-borderless table-striped" id="myTable2">
							<thead>
								<tr>
									<th>STT</th>
									<th><span class="card-title">Tên khách</span></th>
									<th><span class="card-title">Ngày đặt</span></th>
									<th><span class="card-title">Số sản phẩm</span></th>
									<th><span class="card-title">Phương thức thanh toán</span></th>
								</tr>
							</thead>
							<tbody>
								@foreach($allOrderCheck as $ordercheck)
								<tr>
									<td>#{{ $ordercheck->dh_ma }}</td>
									<td style="font-weight: bold">{{ $ordercheck->khachhang->kh_ten}}</td>
									<td>{{ $ordercheck->created_at }}</td>
									<td>{{ count($ordercheck->chitietdonhang) }} sản phẩm</td>
									<td><span class="p-3 badge badge-warning text-white">{{ $ordercheck->pttt->pttt_ten }}</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
					<div class="main-card card container-fluid" style="height: calc(100vh - 250px) !important;">
						<h5 class="pt-3 pb-3">ĐƠN HÀNG BỊ HỦY</h5>
						<table class="table table-hover table-borderless table-striped" id="myTable3">
							<thead>
								<tr>
									<th>STT</th>
									<th><span class="card-title">Tên khách</span></th>
									<th><span class="card-title">Ngày đặt</span></th>
									<th><span class="card-title">Số sản phẩm</span></th>
									<th><span class="card-title">Phương thức</span></th>

								</tr>
							</thead>
							<tbody>
								@foreach($allOrderUncheck as $orderuncheck)
								<tr class="p-3">
									<th>
										<span>#{{ $orderuncheck->dh_ma }}</span>
									</th>
									<td style="font-weight: bold">{{ $orderuncheck->khachhang->kh_ten}}</td>
									<td>{{ $orderuncheck->created_at }}</td>
									<td>{{ count($orderuncheck->chitietdonhang) }} sản phẩm</td>
									<td>
										<span class="p-3 badge badge-warning text-white">{{ $orderuncheck->pttt->pttt_ten }}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-stats">
							<div class="card-body ">
								<div class="row">
									<div class="col-5 col-md-4">
										<div class="icon-big text-center icon-warning">
											<i class="fa fa-file-text-o text-primary" aria-hidden="true"></i>
										</div>
									</div>
									<div class="col-7 col-md-8">
										<div class="numbers">
											<p class="card-category">ĐƠN</p>
											<p class="card-title">{{ count($allOrder)}}</p>
										</div>
									</div>
								</div>
								<div class="card-footer ">
									<hr>
									<div class="stats">
										<i class="fa fa-refresh"></i>
										CHƯA DUYỆT
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card card-stats">
							<div class="card-body ">
								<div class="row">
									<div class="col-5 col-md-4">
										<div class="icon-big text-center icon-warning">
											<i class="fa fa-file-text-o text-success" aria-hidden="true"></i>
										</div>
									</div>
									<div class="col-7 col-md-8">
										<div class="numbers">
											<p class="card-category">ĐƠN</p>
											<p class="card-title">{{ count($allOrderCheck)}}</p>
										</div>
									</div>
								</div>
								<div class="card-footer ">
									<hr>
									<div class="stats">
										<i class="fa fa-refresh"></i>
										ĐÃ DUYỆT
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card card-stats">
							<div class="card-body ">
								<div class="row">
									<div class="col-5 col-md-4">
										<div class="icon-big text-center icon-warning">
											<i class="fa fa-file-text-o text-danger" aria-hidden="true"></i>
										</div>
									</div>
									<div class="col-7 col-md-8">
										<div class="numbers">
											<p class="card-category">ĐƠN</p>
											<p class="card-title">{{ count($allOrderUncheck)}}</p>
										</div>
									</div>
								</div>
								<div class="card-footer ">
									<hr>
									<div class="stats">
										<i class="fa fa-refresh"></i>
										ĐÃ HỦY
									</div>
								</div>
							</div>
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
			$('#myTable2').DataTable();
			$('#myTable3').DataTable();
		});
	</script>
	@endsection

	<div id="myModal1" class="modal fade" role="dialog" style="padding-left:0px !important;">
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
							<hr/>
						</div>
						<div class="col-md-4"></div>
					</div>
					<div id="info1"></div>
					<div id="prod1"></div>
					<div id="total1"></div>
					<hr/>
					<form method="POST" action="{{ route('order.checkout') }}">
						<div class="d-flex">
							<div style="flex: 1">
								<select class="form-control" name="status">
									<option value="1">Duyệt đơn</option>
									<option value="2">Hủy đơn</option>
								</select>
								
								@csrf

							</div>
							<div style="flex-basis: 50px"></div>
							<div style="flex-basis: 50px">
								<button type="submit" class="btn btn-info">Ok</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>