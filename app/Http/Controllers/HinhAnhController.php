<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hinhanh;
use App\hinhanhhanghoa;
use App\Http\Resources\hinhanhhanghoa as HAHHResources;
use App\Http\Resources\hinhanh as HinhAnhResources;

class HinhAnhController extends Controller
{
    public function delHA(Request $request){
    	$id = $request->id;
    	$hinhanh = new hinhanh();
    	$hinhanh->delHA($id);
    }

}
