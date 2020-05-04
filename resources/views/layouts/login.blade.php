@extends('layouts.cartmaster')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="login-form"><!--login form-->
					<h3 style="color: #333; text-align: center;">ĐĂNG NHẬP</h3>
					<br/>
					<form method="POST" action="{{ route('post.login.khachhang') }}">
						<input type="text" placeholder="Emai..." name="email" class="form-control" />
						<br/>
						<input type="password" placeholder="Mật khẩu..." name="password" class="form-control" />

						<hr/>
						<p class="text-center"><button type="submit" class="btn btn-dark">Đăng nhập</button></p>
						@csrf
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</section><!--/form-->
@endsection