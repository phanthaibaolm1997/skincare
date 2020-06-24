<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\donhang;
use App\nhanvien;
use App\khachhang;

class ThongKeController extends Controller
{
    public function index(Request $requset)
    {
  //   	$donhang = new donhang();
  //   	$carbaoDay = Carbon::now()->startOfWeek(); //spesific day
		// $week = []; 
		// $prices = []; 
		// for ($i=0; $i <7 ; $i++) {
		//     $week[] = $carbaoDay->startOfWeek()->addDay($i)->format('Y-m-d');//push the current day and plus the mount of $i 
		// }
		// $thu2 = $donhang->getDonHangByDate($week[0]);
		// $thu3 = $donhang->getDonHangByDate($week[1]);
		// $thu4 = $donhang->getDonHangByDate($week[2]);
		// $thu5 = $donhang->getDonHangByDate($week[3]);
		// $thu6 = $donhang->getDonHangByDate($week[4]);
		// $thu7 = $donhang->getDonHangByDate($week[5]);
		// $thucn = $donhang->getDonHangByDate($week[6]);

		// //thứ 2
		// $price = 0;
		// foreach ($thu2 as $t2) {
		// 	foreach ($t2->chitietdonhang as $ctdg2 ) {
		// 		$price += ($ctdg2->ctdh_soluong * $ctdg2->ctdh_dongia);
		// 	}
		// }
		// array_push($prices,$price);

		// //thứ 3
		// $price = 0;
		// foreach ($thu3 as $t3) {
		// 	foreach ($t3->chitietdonhang as $ctdg3 ) {
		// 		$price += ($ctdg3->ctdh_soluong * $ctdg3->ctdh_dongia);
		// 	}
		// }
		// array_push($prices,$price);

		// //thứ 4
		// $price = 0;
		// foreach ($thu4 as $t4) {
		// 	foreach ($t4->chitietdonhang as $ctdg4 ) {
		// 		$price += ($ctdg4->ctdh_soluong * $ctdg4->ctdh_dongia);
		// 	}
		// }
		// array_push($prices,$price);

		// //thứ 5
		// $price = 0;
		// foreach ($thu5 as $t5) {
		// 	foreach ($t5->chitietdonhang as $ctdg5 ) {
		// 		$price += ($ctdg5->ctdh_soluong * $ctdg5->ctdh_dongia);
		// 	}
		// }
		// array_push($prices,$price);

		// //thứ 6
		// $price = 0;
		// foreach ($thu6 as $t6) {
		// 	foreach ($t6->chitietdonhang as $ctdg6 ) {
		// 		$price += ($ctdg6->ctdh_soluong * $ctdg6->ctdh_dongia);
		// 	}
		// }
		// array_push($prices,$price);

		// //thứ 7
		// $price = 0;
		// foreach ($thu7 as $t7) {
		// 	foreach ($t7->chitietdonhang as $ctdg7 ) {
		// 		$price += ($ctdg7->ctdh_soluong * $ctdg7->ctdh_dongia);
		// 	}
		// }
		// array_push($prices,$price);

		// //thứ CN
		// $price = 0;
		// foreach ($thucn as $tcn) {
		// 	foreach ($tcn->chitietdonhang as $ctdgcn ) {
		// 		$price += ($ctdgcn->ctdh_soluong * $ctdgcn->ctdh_dongia);
		// 	}
		// }
		// array_push($prices,$price);
		// $data['allOrder'] = $donhang->getAllOrder(1000);
		// $data['allOrderCheck'] = $donhang->getAllOrderChecked(1000);
		// $data['allOrderUncheck'] = $donhang->getAllOrderUncheck(1000);
		// $data['DoanhThu'] = $prices;
		// $data['AllWeek'] = $week;
  //   	return view('admin.thongke',$data);
    	$donhang = new donhang();
    	$khachhang = new khachhang();
    	$carbaoDay = Carbon::now()->startOfWeek(); //spesific day
		$week = []; 
		$prices = []; 
		$arrPricesCTV = []; 
		for ($i=0; $i <7 ; $i++) {
		    $week[] = $carbaoDay->startOfWeek()->addDay($i)->format('Y-m-d');//push the current day and plus the mount of $i 
		}
		$arrOng = [];
		$dataOngCC = $khachhang->ongChamChi();
		foreach ($dataOngCC as $ong) {
			if(count($ong->donhang) > 0){
				array_push($arrOng, $ong);
			}
		}
		
		usort($arrOng, function ( $arrOng2,$arrOng1) {
                return count($arrOng1->donhang) <=> count($arrOng2->donhang);
        });
		$data['ongChamChi'] = $arrOng;
		$thu2 = $donhang->getDonHangByDate($week[0]);
		$thu3 = $donhang->getDonHangByDate($week[1]);
		$thu4 = $donhang->getDonHangByDate($week[2]);
		$thu5 = $donhang->getDonHangByDate($week[3]);
		$thu6 = $donhang->getDonHangByDate($week[4]);
		$thu7 = $donhang->getDonHangByDate($week[5]);
		$thucn = $donhang->getDonHangByDate($week[6]);
		//thứ 2
		$price = 0;
		foreach ($thu2 as $t2) {
			foreach ($t2->chitietdonhang as $ctdg2 ) {
				$price += ($ctdg2->ctdh_soluong * $ctdg2->ctdh_dongia);
			}
		}
		array_push($prices,$price);

		//thứ 3
		$price = 0;
		foreach ($thu3 as $t3) {
			foreach ($t3->chitietdonhang as $ctdg3 ) {
				$price += ($ctdg3->ctdh_soluong * $ctdg3->ctdh_dongia);
			}
		}
		array_push($prices,$price);

		//thứ 4
		$price = 0;
		foreach ($thu4 as $t4) {
			foreach ($t4->chitietdonhang as $ctdg4 ) {
				$price += ($ctdg4->ctdh_soluong * $ctdg4->ctdh_dongia);
			}
		}
		array_push($prices,$price);

		//thứ 5
		$price = 0;
		foreach ($thu5 as $t5) {
			foreach ($t5->chitietdonhang as $ctdg5 ) {
				$price += ($ctdg5->ctdh_soluong * $ctdg5->ctdh_dongia);
			}
		}
		array_push($prices,$price);

		//thứ 6
		$price = 0;
		foreach ($thu6 as $t6) {
			foreach ($t6->chitietdonhang as $ctdg6 ) {
				$price += ($ctdg6->ctdh_soluong * $ctdg6->ctdh_dongia);
			}
		}
		array_push($prices,$price);

		//thứ 7
		$price = 0;
		foreach ($thu7 as $t7) {
			foreach ($t7->chitietdonhang as $ctdg7 ) {
				$price += ($ctdg7->ctdh_soluong * $ctdg7->ctdh_dongia);
			}
		}
		array_push($prices,$price);

		//thứ CN
		$price = 0;
		foreach ($thucn as $tcn) {
			foreach ($tcn->chitietdonhang as $ctdgcn ) {
				$price += ($ctdgcn->ctdh_soluong * $ctdgcn->ctdh_dongia);
			}
		}
		array_push($prices,$price);
		$data['allOrder'] = $donhang->getAllOrder(1000);
		$data['allOrderCheck'] = $donhang->getAllOrderChecked(1000);
		$data['allOrderUncheck'] = $donhang->getAllOrderUncheck(1000);
		$data['DoanhThu'] = $prices;
		$data['AllWeek'] = $week;
		
    	return view('admin.thongke',$data);
    }
}
