<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lohang;
use App\chitietlohang;
use App\nhasanxuat;
use App\nhacungcap;
use Session;

class LoHangController extends Controller
{
    public function createLoHang(Request $request){
    	$nsx= $request->nsx;
    	$ncc= $request->ncc;
    	$name= $request->name;
    	$des= $request->des;
    	$date= $request->date;
    	$price= $request->price;
    	// $nv_id = Session()->get('ss_nv_id');
        $nv_id = 1;
    	$lohang = new lohang();
    	$result = $lohang->createLoHang($name,$des,$date,$price,$ncc,$nsx,$nv_id);
    	if($result){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");
    }
    public function getLoHang(Request $request){
        $lohang = new lohang();
        $nsx = new nhasanxuat();
        $ncc = new nhacungcap();
        $data['allLoHang'] = $lohang->getDetailLoHang(10);
        $data['allNSX'] = $nsx->getAllNSX();
        $data['allNCC'] = $ncc->getAllNCC();
        return view('admin.lohang',$data);
    }
}
