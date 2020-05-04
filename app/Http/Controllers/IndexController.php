<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hanghoa;
use App\loaihang;
use App\tintuc;
use Session;

class IndexController extends Controller
{
    public function getIndex(Request $request){
    	// Create models
    	$hanghoa = new hanghoa();
    	$loaihang = new loaihang();
    	// $quocgia = new quocgia();

    	// Call query from Models
    	$data['newProd'] = $hanghoa->getNewProd(6);
    	$data['randProd'] = $hanghoa->getRandProd(12);
    	$data['getCategories'] = $loaihang->getAllLoaiHang();
    	$data['getProdOfCat'] = $loaihang->getProdOfCat();
    	$data['getAllTinTuc'] = $tintuc->getTinTucHome(6);
    	// $data['getNCCOfNation'] = $quocgia->getNCCOfNation();
    	
    	// retiurn data to views page
    	return view('layouts.home', $data);
    }
}
