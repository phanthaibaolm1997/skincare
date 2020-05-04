<!DOCTYPE html>
<html>
<head>
	<title>Login admin</title>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/custom.css')}}">
</head>
<body>
<section id="form"><!--form-->
	<div class="login">
	<h1>Đăng nhập quản lý</h1>
    <form  method="POST" action="{{ route('post.login.admin') }}">
    	<input type="text" name="email" placeholder="email..." required="required" />
        <input type="password" name="password" placeholder="mật khẩu...." required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Đăng nhập</button>
        @csrf
    </form>
</div>
</section><!--/form-->
</body>
</html>
