@extends('layouts.cartmaster')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="login-form"><!--login form-->
					@if (Session::has('success'))
						<div class="alert alert-success">					
							<p>{!! Session::get('success') !!}</li>
						</div>
					@endif
					<h2>Đăng nhập ký tài khoản khách hàng</h2>
					<form method="POST" action="{{ route('register.post')}}">
                        <label>Tài khoản:</label>
                        <input type="text" class="form-control" placeholder="Emai..." name="email" />
                        <label>Mật Khẩu:</label>
                        <input type="password" class="form-control" placeholder="Password..." name="password" />
                        <label>Tên:</label>
                        <input type="text" class="form-control" placeholder="Name..." name="name" />
                        <label>Địa chỉ:</label>
                        <input type="text" class="form-control" placeholder="Address..." name="address" />
                        <label>Số điện thoại:</label>
						<input type="text" class="form-control" placeholder="Phone..." name="phone" />
						
						<div class="row">
							<div class="col-md-6">
								<label>Giới tính:</label>
								<select class="form-control" name="gender">
									<option value="0">Nam</option>
									<option value="1">Nữ</option>
								</select>
							</div>
							<div class="col-md-6">
								<label>Loại tài khoản đăng ký</label>
								<select class="form-control" name="type">
									<option value="0">Khách hàng</option>
									<option value="1">Cộng tác viên</option>
								</select>
							</div>
						</div>
			
						<p class="text-center"><button type="submit" class="btn btn-default">Đăng ký</button></p>
						@csrf
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</section><!--/form-->
@endsection