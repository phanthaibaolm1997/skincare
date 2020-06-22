<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests;
use App\khachhang;
use App\loaikhachhang;



class KhachHangController extends Controller {
	

	public function create(Request $request) {
		$khachhang = new khachhang();
		$khachhang->kh_hovaten = $request->kh_hovaten;
		$khachhang->kh_gioitinh = $request->kh_gioitinh;
		$khachhang->kh_diachi = $request->kh_diachi;
		$khachhang->kh_sdt = $request->kh_sdt;
		$khachhang->email = $request->email;
		$khachhang->password =  bcrypt($request->password);
		$khachhang->lkh_id = $request->lkh_id;
		$khachhang->trangthai_id = $request->trangthai_id;
		$khachhang->save();
		return response()->json("Create Successed");
	}
	public function getAllKH(Request $requset){
    	$khachhang = new khachhang();
    	$loaikhachhang = new loaikhachhang();
    	$data['allKH'] = $khachhang->getAllKH(10);
    	$data['AllLKH'] = $loaikhachhang->getAllLKH();
    	return view('admin.khachhang',$data);
    }


    public function changePwdKH(Request $request){
    	$id = $request->id;
    	$password = $request->password;

    	$khachhang = new khachhang();
    	$result = $khachhang->changePwd($id,$password);
    	
    	if($result){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");
    }

    public function editKhachHang(Request $request){
    	$khachhang = new khachhang();
    	$id = $request->id;
    	$name = $request->name;
    	$sdt = $request->sdt;
    	$lkh = $request->lkh;
    	$diachi = $request->diachi;
    	$birthday = $request->ngaysinh;

    	$result = $khachhang->changeInfo($name,$sdt,$lkh,$diachi,$id,$birthday);
    	if($result){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");

    }
    public function adminKHDetail($id){
        $khachhang = new khachhang();
        $data['infoKH'] = $khachhang->getInfoKH($id);
        return view('admin.khachhang_detail',$data);
    }
}
