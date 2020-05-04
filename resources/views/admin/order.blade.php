@extends('admin.admin')
@section('content')

{{-- <div class="container-fluid"> --}}
	<div class="card-body"  >
		<div class="app-page-title">
			<div class="row">
				<div class="col-md-4">
					<div class="card" style="width: 100%">
						<h5 class="text-center" style="font-size: 1.3em;padding-bottom: 10px; border-bottom: 1px solid #eee;">ĐƠN CHƯA DUYỆT</h5>
				
						<p class="text-center"><span style="font-weight: bold; font-size: 2em">{{ count($allOrder)}}</span> đơn</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 100%">
						<h5 class="text-center" style="font-size: 1.3em;padding-bottom: 10px; border-bottom: 1px solid #eee;">ĐƠN ĐÃ DUYỆT</h5>
				
						<p class="text-center"><span style="font-weight: bold; font-size: 2em">{{ count($allOrderCheck)}}</span> đơn</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 100%">
						<h5 class="text-center" style="font-size: 1.3em;padding-bottom: 10px; border-bottom: 1px solid #eee;">ĐƠN ĐÃ HỦY</h5>
				
						<p class="text-center"><span style="font-weight: bold; font-size: 2em">{{ count($allOrderUncheck)}}</span> đơn</p>
					</div>
				</div>
			</div>
		</div> 
		<div class="main-card card container-fluid" style="height: calc(100vh - 100px) !important;">
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
					<div class="d-flex">
						<div style="flex: 5; padding: 0 5px;">
							<div style="width: 80%; margin: auto; margin-top: 10px">
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
							</div>

							<h5 class="card-title">Đơn hàng</h5>
							<table class="table table-hover table-borderless table-striped">
								<thead>
									<tr>
										<th>STT</th>
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
										<td><span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">{{ $loop->iteration}}</span></td>
										<td style="font-weight: bold">{{ $order->khachhang->kh_ten}}</td>
										<td>{{ $order->dh_ngaylap }}</td>
										<td>{{ count($order->chitietdonhang) }} sản phẩm</td>
										<td>{{ $order->pttt->pttt_ten }} </td>
										<td> 
											<button class="btn btn-info" onClick="viewDetail({{$order}})"  data-toggle="modal" data-target="#myModal">Xem chi tiết</button>
											<button class="btn btn-primary"  onClick="CheckOut({{$order}})" data-toggle="modal" data-target="#myModal1">Xữ lý</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
					<table class="table table-hover table-borderless table-striped">
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
								<td><span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">{{ $loop->iteration}}</span></td>
								<td style="font-weight: bold">{{ $ordercheck->khachhang->kh_ten}}</td>
								<td>{{ $ordercheck->dh_ngaylap }}</td>
								<td>{{ count($ordercheck->chitietdonhang) }} sản phẩm</td>
								<td>{{ $ordercheck->pttt->pttt_ten }} </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
					<table class="table table-hover table-borderless table-striped">
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
							@foreach($allOrderUncheck as $ordercheck)
							<tr>
								<td><span  style="background-color: #3f6ad8; color: #fff; padding: 10px 17px; border-radius: 5px;">{{ $loop->iteration}}</span></td>
								<td style="font-weight: bold">{{ $ordercheck->khachhang->kh_ten}}</td>
								<td>{{ $ordercheck->dh_ngaylap }}</td>
								<td>{{ count($ordercheck->chitietdonhang) }} sản phẩm</td>
								<td>{{ $ordercheck->pttt->pttt_ten }} </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			
		</div>

	</div>
</div>

<!-- Trigger the modal with a button -->
{{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

@endsection
<!-- Modal -->
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
						<hr/>
					</div>
					<div class="col-md-4"></div>
				</div>
				<div id="info"></div>
				<div id="prod"></div>
				<div id="total"></div>
			</div>
		</div>
	</div>
</div>
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
							<input type="hidden" name="id" id="dh_id">
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