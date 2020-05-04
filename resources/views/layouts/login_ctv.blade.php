@extends('layouts.cartmaster')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="login-form"><!--login form-->
					<h2>Đăng nhập cộng tác viên</h2>
					<form method="POST" action="{{ route('post.login.ctv') }}">
						<input type="text" placeholder="Emai..." name="email" />
						<input type="password" placeholder="Mật khẩu..." name="password" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Giữ đăng nhập lần tiếp theo
						</span>
						<p class="text-center"><button type="submit" class="btn btn-default">Đăng nhập</button></p>
						@csrf
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</section><!--/form-->
@endsection