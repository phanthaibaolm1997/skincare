<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\hanghoa;
use App\loaihang;
use App\nhasanxuat;
use App\nhacungcap;
use App\donhang;
use App\khachhang;
use App\danhgia;

class PageController extends Controller
{
	public function getDetailProd(Request $request){
    	//get param request
		$id = $request->id;

    	// create call model
		$hanghoa = new hanghoa();
		$loaihang = new loaihang();
		$danhgia = new danhgia();


    	// query
		$data["detailProd"] = $hanghoa->detailProd($id);
		$data['getCategories'] = $loaihang->getAllLoaiHang();

		$data['maxPrice'] = $hanghoa->maxPrice();
		$data['minPrice'] = $hanghoa->minPrice();

        // Get type of product
		$type = $data["detailProd"]->ma_lh;

        // Query
			$data['recomProd'] = $hanghoa->recomProd($type,8);
			$data['comments'] = $danhgia->getComment($id);
		// dd($data['comments']);
		

    	// Return data
		return view('layouts.product-detail',$data);

	}
	
	public function ProdCat(Request $request){
		//get param request
		$id = $request->id;
		
		// create call model
		$hanghoa = new hanghoa();
		$loaihang = new loaihang();
	
		$nhasanxuat = new nhasanxuat();
		$nhacungcap = new nhacungcap();
		
		// query
		$data['getCategories'] = $loaihang->getAllLoaiHang();
	
		$data['allProdCat'] = $hanghoa->getAllProdCat($id,8);
		$data['maxPrice'] = $hanghoa->maxPrice();
		$data['minPrice'] = $hanghoa->minPrice();
		$data['getAllNSX'] = $nhasanxuat->getAllNSX();
		$data['getAllNCC'] = $nhacungcap->getAllNCC();


		return view('layouts.category',$data);
	}
	public function ProdProducer(Request $request){
		//get param request
		$id = $request->id;
		
		// create call model
		$hanghoa = new hanghoa();
		$loaihang = new loaihang();
		
		
		// query
		$data['getCategories'] = $loaihang->getAllLoaiHang();

		$data['allProdProducer'] = $hanghoa->getAllProdProducer($id,8);

		return view('layouts.producer',$data);
	}
	public function ProdSupplier(Request $request){
		//get param request
		$id = $request->id;
		
		// create call model
		$hanghoa = new hanghoa();
		$loaihang = new loaihang();

		
		// query
		$data['getCategories'] = $loaihang->getAllLoaiHang();

		$data['allProdSupplier'] = $hanghoa->getAllProdSupplier($id,8);

		return view('layouts.category',$data);
	}

	public function filterProd(Request $request){
		//get param request
		$key = $request->key;
		$ncc = $request->ncc;
		$nsx = $request->nsx;
		$price = $request->price;
		$price = explode(",",$price);
		$type = $request->type;

		//call model
		$hanghoa = new hanghoa();

		// query
		$data = $hanghoa->filterProd($key,$nsx,$ncc,$type,$price);
		return response()->json([
			'data' => $data
		]);
		// return Response::json( $data );
	}

	public function getHistory(Request $request){
		$id =  Session::get('ss_kh_id');
		$donhang = new donhang();
		$data['allHis'] = $donhang->getOrderByKH($id);
		return view('layouts.history',$data);
	}
	public function getProfile(Request $request){
		$id =  Session::get('ss_kh_id');
		if($id !== null){
			$khachhang = new khachhang();
			$data['allInfo'] = $khachhang->getInfoKH($id);
		}else{
			$data = [];
		}
		return view('layouts.profile',$data);
	}

	public function postDanhGia(Request $request){
		$id = $request->id;
		$text = $request->binhluan;
		$star = $request->star;
		$kh =  Session::get('ss_kh_id');

		$danhgia = new danhgia();
		$danhgia->postDanhGia($id,$kh,$text,$star);

		return redirect()->back()->with('success', "Đánh giá thành công!!");
	}
}
