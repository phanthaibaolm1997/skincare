<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\khachhang;
use Session;

class LoginController extends Controller {

	public function guardKH() {
		return Auth::guard("khachhang");
	}
	// login khach hang
	public function getLoginKH(Request $request){
		return view('layouts.login');
	}
	public function getLoginAdmin(Request $request){
		return view('admin.login');
	}
	public function loginKH(Request $request) {
		$credentials = $request->only('email', 'password');
		if (Auth::guard('khachhang')->attempt($credentials)) {
			$request->session()->put('ss_kh_email',$request->input('email'));
			$request->session()->put('ss_kh_id',Auth::guard('khachhang')->user()->kh_ma);
			return redirect()->route('home');
		}
		dd('Sai tài khoản hoặc mật khẩu?');
	}
	public function loginAdmin(Request $request) {
		$credentials = $request->only('email', 'password');
		if (Auth::guard('nhanvien')->attempt($credentials)) {
			$request->session()->put('ss_nv_email',$request->input('email'));
			$request->session()->put('ss_nv_id',Auth::guard('nhanvien')->user()->nv_ma);
			$request->session()->put('ss_nv_vt',Auth::guard('nhanvien')->user()->vt_id);
			return redirect()->route('admin');
		}
		dd('Sai tài khoản hoặc mật khẩu?');
	}
	public function getRegisterKH(Request $request){
		return view('layouts.register');
	}

	public function register(Request $request){
		$name = $request->name;
		$address = $request->address;
		$gender = $request->gender;
		$phone = $request->phone;
		$email = $request->email;
		$password = $request->password;
		if($request->type === "0"){
			$khachhang = new khachhang();
			$khachhang->create($name,$address,$phone,$gender,$email,$password);
		}else{
			$congtacvien = new congtacvien();
			$congtacvien->create($name,$address,$phone,$gender,$email,$password);
		}
		return redirect()->back()->with('success', "Đăng ký thành công!!");

	}
	public function logout(){
		Auth::logout();
		Session::flush();
		return redirect()->route('home');
	}


}
