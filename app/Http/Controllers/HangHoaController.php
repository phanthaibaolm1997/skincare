<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\hanghoa as HanghoaResources;
use App\hanghoa;
use App\hinhanh;
use App\hinhanhhanghoa;
use App\chitietlohang;
use App\chitietdactinh;
use App\lohang;

class HangHoaController extends Controller
{
	public function createProd(Request $request){
		$name = $request->name_hh;
		$des = $request->des;
		$number = $request->number;
		$price = $request->price;
		$lohang = $request->lohang;
		$type = $request->type;
		$ngaysx = $request->ngaysx;
		$hansd = $request->hansd;
		$giagoc = $request->giagoc;

		//covert string to array
		$strKey = $request->arrKey;
		$strName = $request->arrName;
		$arrKey = explode(",", $strKey[0]);
		$arrName = explode(",", $strName[0]);

		//create model
		$hanghoa = new hanghoa();
		$hinhanh = new hinhanh();
		$hahh = new hinhanhhanghoa();
		$ctlh = new chitietlohang();
		$ctdt = new chitietdactinh;

		
		//query
		$hhID = $hanghoa->createProd($name,$des,$number,$price,$type);
		$ctlh->createCTLH($hhID, $lohang,$ngaysx,$hansd,$giagoc,$number);
		
		$i = 1;
		$j = 0;
		//add tinh nang
		foreach($arrKey as $key){
			$ctdt->createCTDT($hhID,$key,$arrName[$j]);
			$j+= 1;
		}
		//upload and move images
		if($request->hasfile('imgup'))
		{
			foreach($request->file('imgup') as $file)
			{
				//create name image with time + i + extension
				$name = 'assets/images/products/'.time().'_'.$i.'.'.$file->extension();
				//move file into folder product
				$file->move(public_path().'/assets/images/products/', $name);  
				$data[] = $name;  
				$i+= 1;
				$idHA = $hinhanh->createHA($name);
				$idHA = $hahh->createHAHH($hhID,$idHA);
			}
		}

    	return redirect()->back()->with('success', "Thêm mới thành công!!");

	}
	public function updateProd(Request $request){
		$hhID = $request->id;
		$name = $request->name_hh;
		$des = $request->des;
		$number = $request->number;
		$price = $request->price;
		$lohang = $request->lohang;
		$type = $request->type;
		// $ngaysx = $request->ngaysx;
		// $hansd = $request->hansd;
		$giagoc = $request->giagoc;

		//covert string to array
		$strKey = $request->arrKey;
		$strName = $request->arrName;
		$arrKey = explode(",", $strKey[0]);
		$arrName = explode(",", $strName[0]);

		//create model
		$hanghoa = new hanghoa();
		$hinhanh = new hinhanh();
		$hahh = new hinhanhhanghoa();
		$ctlh = new chitietlohang();
		$ctdt = new chitietdactinh;

		
		//query
		$hanghoa->updateProd($hhID,$name,$des,$number,$price,$type);
		$ctlh->updateCTLH($hhID, $lohang,$giagoc,$number);
		
		$i = 1;
		$j = 0;
		//add tinh nang
		$ctdt->deleteAllbyID($hhID);
		foreach($arrKey as $key){
			$ctdt->createCTDT($hhID,$key,$arrName[$j]);
			$j+= 1;
		}
		//upload and move images
		if($request->hasfile('imgup'))
		{
			foreach($request->file('imgup') as $file)
			{
				//create name image with time + i + extension
				$name = 'assets/images/products/'.time().'_'.$i.'.'.$file->extension();
				//move file into folder product
				$file->move(public_path().'/assets/images/products/', $name);  
				$data[] = $name;  
				$i+= 1;
				$idHA = $hinhanh->createHA($name);
				$idHA = $hahh->createHAHH($hhID,$idHA);
			}
		}

    	return redirect()->back()->with('success', "chinh sua thành công!!");

	}
	public function addHangOld($id, Request $request){
        $mota = $request->mota;
        $date= $request->date;
        $gia= $request->gia;
        $soluong= $request->soluong;
        $name= $request->name;
        $ngaysx= $request->nsx;
        $hsd= $request->hsd;
        $nv_id = Session()->get('ss_nv_id');

        $lohang = new lohang();
        $hanghoa = new hanghoa();
        $ctlh = new chitietlohang();

        $data = $ctlh->getFirst($id);

        $ncc = $data->lohang->ncc_ma;
        $nsx = $data->lohang->nsx_ma;


        $lh_ma = $lohang->createLoHang($name,$mota,$date,$gia,$ncc,$nsx,$nv_id);
        $ctlh->createCTLH($id,$lh_ma,$ngaysx,$hsd,$gia,$soluong);
        $hanghoa->updateSoLuong($id,$soluong);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
}
