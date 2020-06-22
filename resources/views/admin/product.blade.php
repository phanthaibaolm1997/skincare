@extends('admin.admin')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="main-card card">
				<div class="card-body" style="background-color: #59afec;">
					<div class="d-flex">
						<h5 style="flex: 1; line-height: 45px; color: #fff;">DANH SÁCH SẢN PHẨM</h5>
						<a href="{{ route('hanghoa.add') }}"><button style="flex-basis: auto;" class="btn btn-success">THÊM MỚI</button></a>
					</div>
				</div>
			</div>
			<div class="main-card card">
				<div class="card-body">
					<table class="table" id="myTable">
						<thead class="table-primary">
							<tr>
								<th>#</th>
								<th><span class="card-title">Hình ảnh</span></th>
								<th><span class="card-title">Tên sản phẩm</span></th>
								<th><span class="card-title">Giá bán</span></th>
								<th><span class="card-title">Còn Lại</span></th>
								<th><span class="card-title">Tùy chỉnh</span></th>
							</tr>
						</thead>
						<tbody>
							@foreach($allProd as $prod)
							<tr>
								<td>#{{ $prod->hh_ma }}</td>
								<td>
									<img src="{{asset($prod->hinhanhhanghoa[0]->hinhanh->ha_url) }}" alt="" / width="96px">
								</td>
								<td style="font-weight: bold">{{ $prod->hh_ten}}</td>
								<td>{{ number_format($prod->hh_dongia) }} đ</td>
								<td>
									@if($prod->hh_conlai > 0)
										<strong>{{ $prod->hh_conlai}}</strong> Sản Phẩm
									@else
										<span class="badge badge-pill badge-danger p-2">Hết Hàng</span>
									@endif
								</td>
								<td> 
									<a href="{{ route('prod.edit',$prod->hh_ma) }}">
										<button type="button" tabindex="0" class="btn btn-primary">
											<i class="fa fa-edit" aria-hidden="true"></i>
										</button>
									</a>
									<button type="button" tabindex="0" class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button>
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{ $prod->hh_ma }}">
										<i class="fa fa-info" aria-hidden="true"></i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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


@foreach($allProd as $prod)
<div class="modal fade" id="myModal{{ $prod->hh_ma }}">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">{{ $prod->hh_ten }}</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						@foreach($prod->hinhanhhanghoa as $ha)
						<img src="{{asset($ha->hinhanh->ha_url) }}" alt="" class="w-100" />
						@endforeach
					</div>
					<div class="col-md-8">
						<h4 class="mt-3 title-head">
							<i class="fa fa-product-hunt" aria-hidden="true"></i>
							<strong>{{ $prod->hh_ten }}</strong>
						</h4>
						<h6 class="mt-3"> GIÁ BÁN: {{ number_format($prod->hh_dongia) }} đ
						</h6>
						<h6 class="mt-3"> CÒN LẠI: 
							{{ $prod->hh_conlai }}<span class="bagde-primary"> SẢN PHẨM</span>
						</h6>
					</div>
				</div>
				<br/>
				<h3 class="title-head mt-2">
					<i class="fa fa-info-circle" aria-hidden="true"></i> Mô tả sản phẩm
				</h3>
				<div>
					{!! $prod->hh_mota !!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endforeach