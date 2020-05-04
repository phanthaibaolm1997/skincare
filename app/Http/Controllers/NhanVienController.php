<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhanvien;
use App\loainhanvien;

class NhanVienController extends Controller
{
    public function getAllNV(Request $requset){
    	$nhanvien = new nhanvien();
    	$loainhanvien = new loainhanvien();
    	$data['allNV'] = $nhanvien->getAllNV(10);
    	$data['AllLNV'] = $loainhanvien->getAllLNV();
    	return view('admin.nhanvien',$data);
    }

    public function createNhanVien(Request $request){
    	$nhanvien = new nhanvien();
    	$name = $request->name;
    	$sdt = $request->sdt;
    	$lnv = $request->lnv;
    	$diachi = $request->diachi;
    	$email = $request->email;
    	$password = $request->password;

    	$result = $nhanvien->createNV($name,$sdt,$lnv,$diachi,$email,$password);

    	if($result){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");

    }

    public function changePwd(Request $request){
    	$id = $request->id;
    	$password = $request->password;

    	$nhanvien = new nhanvien();
    	$result = $nhanvien->changePwd($id,$password);
    	
    	if($result){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");
    }

    public function editNhanVien(Request $request){
    	$nhanvien = new nhanvien();
    	$id = $request->id;
    	$name = $request->name;
    	$sdt = $request->sdt;
    	$lnv = $request->lnv;
    	$diachi = $request->diachi;

    	$result = $nhanvien->changeInfo($name,$sdt,$lnv,$diachi,$id);
    	if($result){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");

    }
}
