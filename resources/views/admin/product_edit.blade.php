@extends('admin.admin')
@section('content')

<div class="container-fluid">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-voicemail icon-gradient bg-arielle-smile">
					</i>
				</div>
				<div>Sản phẩm & Hàng hóa - chỉnh sửa
					<div class="page-title-subheading">Trái đất cứ lặng lẽ quay.. quay quay quay vô tận mãi mãi...
					</div>
				</div>
			</div>    
		</div>
	</div> 
	<form method="POST" action="{{ route('prod.eidt.post') }}" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-9">
				<div class="main-card card">
					<div class="card-body">
					<h5 class="card-title">Chỉnh sửa hàng hóa</h5>
					<ul class="nav nav-tabs">
						  <li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home">Thông tin hàng hóa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu1">Hình ảnh hàng hóa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tab3">Thông số kỷ thuật</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="home"  style="min-height: 70vh">
							<input type="text" name="name_hh" placeholder="Nhập tên hàng hóa" class="form-control" required value="{{$prod->hh_ten}}">
							<br/>
							<textarea id="editor" name="des" required>{{$prod->hh_mota}}</textarea>
							<script>
								CKEDITOR.replace( 'editor',{height: 600} );
							</script>
							<br>
							<span class="card-title">Giá Sản phẩm</span>
							<div style="width: 50%">
								<input type="text" name="price" placeholder="Giá sản phẩm" class="form-control" required value="{{$prod->hh_dongia}}">
							</div>
						</div>
						<div class="tab-pane container fade" id="menu1"  style="min-height: 70vh">
							<span class="card-title">Hình ảnh</span>
							<div class="container-fluid"> 
								@foreach($prod->hinhanhhanghoa as $hahh)
									<div style="position: relative; display: inline-block;" class="parent-img">
										<img src="{{ asset($hahh->hinhanh->ha_url) }}" style="object-fit: cover;
										  width: 128px;
										  height: 128px;
										  margin: 10px;" />
									  <button type="button" 
										class="btn btn-danger remove-img" 
										attr-id="{{ $hahh->ha_id }}"
										style="position: absolute; top: 0; right: 0">X</button>
									</div>
								@endforeach
							</div>
							<span class="card-title">Thêm mới hình ảnh</span>
							<input type="file" multiple id="gallery-photo-add" name="imgup[]">
							<div class="gallery"></div>
						</div>
						<div class="tab-pane container fade" id="tab3" style="min-height: 70vh">
							<h5 class="card-title">Tính năng sản phẩm</h5>
							<div style="display: flex">
								<select class="form-control" style="flex: 1" id="selectdt">
									@foreach($getAllDatTinh as $dt)
										<option value="{{$dt->dt_ma}}">{{$dt->dt_ten}}</option>
									@endforeach
								</select>
									<button class="btn btn-primary" id="btndt" style="flex-basis: auto; margin-left: 10px" type="button">+</button>
								</div>
								<br/>
								<h5 class="card-title">Tính năng thêm mới</h5>
								<table class="table table-bordered">
									<tr>
										<td>Tên Thuộc tính</td>
										<td>Giá trị</td>
										<td>Thao tác</td>
									</tr>
									<tbody id="table-content">
										@foreach($allTSKT as $tskt)
											<tr class='trRemove'>

												<td><input type='hidden' value='{{$tskt->dactinh->dt_ma}}' name='key[]' class='form-control' disabled>
													<input type='text' value='{{$tskt->dactinh->dt_ten}}' class='form-control' disabled></td>
												<td><input type='text'  name='name[]' class='form-control' value="{{$tskt->thongso}}"></td>
												<td><button class='btn btn-danger btnRemove' type='button'>-</button></td>
											</tr>
										@endforeach
										<input type="hidden" name="arrKey[]" id="arrKey">
										<input type="hidden" name="arrName[]" id="arrName">
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
						<h5 class="card-title">Loại hàng hóa</h5>
						<select class="form-control" required name="type">
							@foreach($getAllType as $type)
							<option value="{{ $type->ma_lh }}">{{ $type->ten_lh }}</option>
							@endforeach
						</select>
					</div>
					<div class="card-body">
						<h5 class="card-title">Lô Hàng</h5>
						<div class="d-flex">
							<div style="flex: 1;margin-right: 5px;">
								<select class="form-control" required name="lohang">
									@foreach($getAllLoHang as $lohang)
									<option value="{{ $lohang->lh_ma }}">{{ $lohang->lh_ten }}</option>
									@endforeach
								</select>
							</div>
							<div style="flex-basis: 50px">
								<button class="btn btn-primary"  data-toggle="modal" data-target="#myModal">...</button>
							</div>
						</div>
						<br/>
						<h5 class="card-title">Số lượng</h5>
						<input type="hidden" name="id" value="{{ $prod->hh_ma }}">
						<input type="number" name="number" placeholder="Số lượng" class="form-control" required value="{{$prod->hh_conlai}}">
						<br/>
						<h5 class="card-title">Ngày nhập</h5>
						<input type="date" name="date" placeholder="Ngày nhập hàng" class="form-control" required value="{{$prod->chitietlohang[0]->lohang->lh_ngaynhap}}">
						<br/>
						<h5 class="card-title">Giá Gốc</h5>
						<input type="number" name="giagoc" placeholder="Nhập giá gốc" class="form-control" required value="{{$prod->chitietlohang[0]->ctlh_dongia}}">
						<br>
						<br>
						@csrf
						<p class="text-center">
							<button class="btn btn-primary sub">Edit sản phẩm</button>
						</p>
					</div>
				</div>    
			</div>   
		</div>
	</form>
</div>
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
		$('body').on('click', '.remove-img', function(event) {
			event.preventDefault();
			let check = confirm("Bạn có chắc chắn muốn xóa?");
			if (check == true) {
				$(this).parents('.parent-img').remove();
				let idImg = $(this).attr('attr-id');
				let url = "{{ url('admin/hinhanh/delete/')}}/" + idImg;
				console.log(url);
				$.ajax({
			        type: "GET",
			        url: url,
			        success: function(data) {
			            alert('xóa thành công!');
			        }
			    });								
			}
			
		});
	});
</script>
@endsection
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
</form>
</div>
</div>
</div>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
