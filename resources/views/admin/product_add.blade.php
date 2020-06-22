@extends('admin.admin')
@section('content')

<div class="container-fluid">
	<div class="main-card card">
		<div class="card-body" style="background-color: #59afec;">
			<div class="d-flex">
				<h5 style="flex: 1; line-height: 45px; color: #fff;">THÊM MỚI SẢN PHẨM</h5>
				{{-- <a href="{{ route('hanghoa.add') }}"><button style="flex-basis: auto;" class="btn btn-success">THÊM MỚI</button></a> --}}
			</div>
		</div>
	</div>
	<form method="POST" action="{{ route('prod.add.post') }}" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-9">
				<div class="main-card card">
					<div class="card-body"style="min-height: 75vh">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab1">Thông tin sản phẩm</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab2">Hình ảnh</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab3">Chi tiết tính năng</a>
							</li>
						</ul>
						<div class="tab-content">
							<br/>
							<div class="tab-pane container active" id="tab1">
								<input type="text" name="name_hh" placeholder="Nhập tên hàng hóa" class="form-control" required>
								<br/>
								<textarea id="editor" name="des" required></textarea>
								<script>
									CKEDITOR.replace( 'editor',{height: 600} );
								</script>
								<br>
								<div style="width: 50%">
									<input type="text" name="price" placeholder="Giá sản phẩm" class="form-control" required>
								</div>						  
							</div>
							<div class="tab-pane container fade" id="tab2">
								<span class="card-title">Hình ảnh</span>
								<input type="file" multiple id="gallery-photo-add" required name="imgup[]">
								<div class="gallery"></div>
							</div>
							<div class="tab-pane container fade" id="tab3">
								<label> Tính Năng Sản Phẩm</label>
								<div style="display: flex">
									<select class="form-control" style="flex: 1" id="selectdt">
										@foreach($getAllDatTinh as $dt)
										<option value="{{$dt->dt_ma}}">{{$dt->dt_ten}}</option>
										@endforeach
									</select>
									<button class="btn btn-primary ml-2" style="margin: 0px" id="btndt" style="flex-basis: auto; margin-left: 10px" type="button">Thêm vào</button>
								</div>
								<br/>
								<label> Danh sách tính năng</label>
								<table class="table table-bordered">
									<tr>
										<td>Tên Thuộc tính</td>
										<td>Giá trị</td>
										<td>Thao tác</td>
									</tr>
									<tbody id="table-content">

									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-3">
				<div class="main-card card md-3">
					<div class="card-body">
						<label>Loại Hàng</label>
						<select class="form-control" required name="type">
							@foreach($getAllType as $type)
							<option value="{{ $type->ma_lh }}">{{ $type->ten_lh }}</option>
							@endforeach
						</select>
						<br/>
						<label> Lô Hàng</label>
						<div class="d-flex">
							<div style="flex: 1;margin-right: 5px;">
								<select class="form-control" required name="lohang">
									@foreach($getAllLoHang as $lohang)
									<option value="{{ $lohang->lh_ma }}">{{ $lohang->lh_ten }}</option>
									@endforeach
								</select>
							</div>
							<div style="flex-basis: 50px">
								<button class="btn btn-primary" style="margin: 0px" data-toggle="modal" data-target="#myModal">...</button>
							</div>
						</div>
						<label> Số lượng</label>
						<input type="number" name="number" placeholder="Số lượng" class="form-control" required>
						<br/>
						<label>Ngày nhập</label>
						<input type="date" name="date" placeholder="Ngày nhập hàng" class="form-control" required>
						<br/>
						<label>Ngày sản xuất</label>
						<input type="date" name="ngaysx" placeholder="Ngày nhập hàng" class="form-control" required>
						<br/>
						<label>Hạn sử dụng</label>
						<input type="date" name="hansd" placeholder="Ngày nhập hàng" class="form-control" required>
						<br/>
						<label>Giá nhập</label>
						<input type="number" name="giagoc" placeholder="Nhập giá gốc" class="form-control" required>
						<input type="hidden" name="arrKey[]" id="arrKey">
						<input type="hidden" name="arrName[]" id="arrName">
						<br>
						<br>
						@csrf
						<p class="text-center">
							<button class="btn btn-primary sub" >Thêm sản phẩm</button>
							{{-- <button class="btn btn-primary" type="submit">Thêm sản phẩm 1</button> --}}
						</p>
					</div>
				</div>       
			</div>
		</div>
	</form>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#btndt').click(function(event) {
			let id = $('#selectdt').val();
			let name = $('#selectdt').find('option:selected').text();
			let html = "<tr class='trRemove'>"+
			"<input type='hidden' value='"+id+"' name='key[]' class='form-control' disabled>"+
			"<td><input type='text' value='"+name+"' class='form-control' disabled></td>"+
			"<td><input type='text' value='' name='name[]' class='form-control'></td>"+
			"<td><button class='btn btn-danger btnRemove' type='button'>-</button></td>"+
			"</tr>";
			$('#table-content').append(html);
			
		});
		$('body').on('click', '.btnRemove', function(event) {
			$(this).parents('.trRemove').remove();
		});
		$('.sub').click(function(event) {
			let keys = new Array();
			let names = new Array();
			$("input[name='key[]']").each(function() {
				keys.push($(this).val());
			});
			$("input[name='name[]']").each(function() {
				names.push($(this).val());
			});
			$('#arrName').val(names);
			$('#arrKey').val(keys);
		});
	});
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<form method="POST" action="{{ route('lohang.add.post') }}">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="card-title">Thêm một Lô Hàng mới</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h5 class="card-title">Tên Lô Hàng</h5>
					<input type="text" name="name" class="form-control" placeholder="Nhập Tên Lô Hàng..." required>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<h5 class="card-title">Ngày nhập</h5>
							<input type="date" name="date" class="form-control" required>
						</div>
						<div class="col-md-6">
							<h5 class="card-title">Trị giá</h5>
							<input type="number" name="price" class="form-control" placeholder="Nhập giá trị.." required>
						</div>
					</div>
					<br/>
					<h5 class="card-title">Mô tả</h5>
					<textarea class="form-control" name="des" placeholder="Nhập mô tả..." rows="5" required></textarea>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<h5 class="card-title">Nhà cung cấp</h5>
							<select class="form-control" name="ncc" required>
								@foreach($allNCC as $ncc)
								<option value="{{$ncc->ncc_ma}}">{{$ncc->ncc_ten}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-6">
							<h5 class="card-title">Nhà sản xuất</h5>
							<select class="form-control" name="nsx" required>
								@foreach($allNSX as $nsx)
								<option value="{{$nsx->nsx_ma}}">{{$nsx->nsx_ten}}</option>
								@endforeach
							</select>
						</div>
						@csrf
					</div>
					<br/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Thêm</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
