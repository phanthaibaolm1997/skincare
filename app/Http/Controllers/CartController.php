<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chitietgiohang;
use App\giohang;
use App\donhang;
use App\loaihang;
use App\quocgia;
use App\khachhang;
use App\hanghoa;
use App\pttt;
use App\chitietdonhang;
use App\loaikhachhang;
use Session;


class CartController extends Controller
{


	public function addToCart(Request $request) {
		// Call model
		$giohang = new giohang();
		$cart = new chitietgiohang();
		$hanghoa = new hanghoa();
		// Pretreatment 
		$dataGioHang = $giohang->getCart($request->userId);
		// Get Param
		$gh_id = $dataGioHang->gh_id;
		$hh_ma = $request->idProd;
		$quality = $request->quality;
		$price = $request->price;
		// Query
		$cart->createOrUpdateCart($gh_id,$hh_ma,$quality,$price);
		$hanghoa->subtractQuality($hh_ma,$quality);
		return response()->json("SUCCESED",200);
	}

	public function getCart(Request $request){
		// create call model
		$giohang = new giohang();
    	// Get param
		$idUser = Session()->get('ss_kh_id');
		$data['getDetailCart'] = $giohang->getDetailCart($idUser);
    	// Return
		return view('layouts.cart',$data);
	}

	public function deleteCart(Request $request){
		// Create call model
		$cart = new chitietgiohang();
		$giohang = new giohang();
		$hanghoa = new hanghoa();
    	// Get param
		$hh_ma = $request->hh_ma;
		$kh_id = $request->kh_id;
		$quality = $request->quality;
    	// Pretreatment 
		$dataGioHang = $giohang->getCart($kh_id);
		$cart->deleteCart($hh_ma,$dataGioHang->gh_id); // delete cart
		$hanghoa->addBackQuality($hh_ma,$quality); // add back quality of product when customer cancel an order

		return response()->json("Succesed",200);
	}

	public function checkout(Request $request) {
		// create call model
		$giohang = new giohang();
		$khachhang = new khachhang();
		$pttt = new pttt();
    	// Get param
		$idUser = Session()->get('ss_kh_id');
		$data['getInfoKH'] = $khachhang->getInfoKH($idUser);
		$data['getDetailCart'] = $giohang->getDetailCart($idUser);
		$data['getPTTT'] = $pttt->getPTTT();

		return view('layouts.checkout',$data);
	}
	
	public function checkPayment(Request $request){
		$price = 0;
		// create call model
		$donhang = new donhang();
		$giohang = new giohang();
		$ctdh = new chitietdonhang();
		$cart = new chitietgiohang();
		$khachhang = new khachhang();
		$loaikhachhang = new loaikhachhang();

		$kh_id = Session()->get('ss_kh_id');
		//get Param
		$dh_nguoinhan = $request->dh_nguoinhan;
		$dh_diachi = $request->dh_diachi;
		$dh_sdt = $request->dh_sdt;
		$dh_ghichu = $request->dh_ghichu;
		$pttt = $request->pttt;

		// Query
		$dataGioHang = $giohang->getCart($kh_id);
		$getDetailCart = $giohang->getDetailCart($kh_id);
		$dh_id = $donhang->createDH($dh_nguoinhan,$dh_diachi,$dh_sdt,$dh_ghichu,$pttt,$kh_id);
		foreach($getDetailCart->chitietgiohang as $detailcart){
			$cart->deleteCart($detailcart->hh_ma,$dataGioHang->gh_id);
			$ctdh->createDetailDH($dh_id,$detailcart->hh_ma,$detailcart->ctgh_dongia,$detailcart->ctgh_soluong);
		}
		$dataKH = $khachhang->getInfoKH($kh_id);

		$hanmuc = $dataKH->loaikhachhang->lkh_hanmuctien;
		$lkh_ma =  $dataKH->lkh_ma +1;
		$dataDH = $donhang->detailDHByKH($kh_id);
		foreach ($dataDH as $ctdh) {
			foreach ($ctdh->chitietdonhang as $o) {
				$price += $o->ctdh_soluong * $o->ctdh_dongia;
			}
		}
		$gethanmuckh = $loaikhachhang->getLKHbyID($lkh_ma);
		if($price >= $gethanmuckh->lkh_hanmuctien){
			$khachhang->updateLKH($kh_id,$gethanmuckh->lkh_ma);
			return redirect()->intended('/')->with('success', "Bạn vừa được nâng cấp loại!!");
		}
		return redirect()->intended('/');
	}

	public function update(Request $request, $gh_id, $hh_ma)
	{
		$update = chitietgiohang::firstOrFail()->where(
			[
				'gh_id'=> $gh_id,
				'hh_ma'=> $hh_ma
			]
		);
		if($update){
			$update->update($request->all());
			return response()->json("Updated!", 200);
		}
		return response()->json("NOT FOUND", 404);
	}
}
