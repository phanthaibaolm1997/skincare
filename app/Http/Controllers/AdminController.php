<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hanghoa;
use App\loaihang;
use App\nhasanxuat;
use App\nhacungcap;
use App\donhang;
use App\lohang;
use App\dactinh;
use App\chitietdactinh;
use App\tintuc;

class AdminController extends Controller
{
	public function admin(){
		return view('admin.index');
	}
// Product
	public function adminProd(Request $request){
		$hanghoa = new hanghoa();
		$data['allProd'] = $hanghoa->getAllProd(10);
		return view('admin.product',$data);
	}
	public function adminProdAdd(Request $request){
		$lohang = new lohang();
		$loaihang = new loaihang();
		$nsx = new nhasanxuat();
		$ncc = new nhacungcap();
		$dactinh = new dactinh();
		$data['getAllLoHang'] = $lohang->getAllLoHang();
		$data['getAllType'] = $loaihang->getAllType();
		$data['getAllDatTinh'] = $dactinh->getAllDatTinh();
		$data['allNSX'] = $nsx->getAllNSX();
		$data['allNCC'] = $ncc->getAllNCC();
		return view("admin.product_add",$data);
	}
//Category
	public function adminCat(Request $request){
		$loaihang = new loaihang();
		$data['allLoaiHang'] = $loaihang->getAllPaginate(10);
		return view("admin.cat",$data);
	}
	public function adminCatEdit(Request $request){
		$id = $request->id_e;
		$name = $request->name_e;
		$des = $request->des_e;
		$loaihang = new loaihang();
		$update = $loaihang->updateCat($id,$name,$des);
		if($update){
			return redirect()->back()->with('success', "Cập nhật thành công!!");
		}
		return redirect()->back()->with('error', "Cập nhật thất bại!!");
	}
	public function adminCatDel($id){
		$loaihang = new loaihang();
		$del = $loaihang->delCat($id);
		if($del){
			return redirect()->back()->with('success', "Xóa thành công!!");
		}
		return redirect()->back()->with('error', "Xóa thất bại!!");
	}
	public function adminCatAdd(Request $request){
		$name = $request->name_c;
		$des = $request->des_c;
		$loaihang = new loaihang();
		$create = $loaihang->createCat($name,$des);
		if($create){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");
	}
//NCC - NSX
	public function adminProv(Request $request){
		$nsx = new nhasanxuat();
		$ncc = new nhacungcap();
		$data['allNSX'] = $nsx->getAllNSX();
		$data['allNCC'] = $ncc->getAllNCC();
		return view("admin.provide",$data);
	}
	public function adminNSXAdd(Request $request){
		$name = $request->name;
		$nation = $request->nation;
		$nsx = new nhasanxuat();
		$result = $nsx->createNSX($name,$nation);
		if($result){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");
	}
	public function adminNSXEdit(Request $request){
		$name = $request->name;
		$nation = $request->nation;
		$id = $request->id;
		$nsx = new nhasanxuat();
		$result = $nsx->updateNSX($id,$name,$nation);
		if($result){
			return redirect()->back()->with('success', "Cập nhật thành công!!");
		}
		return redirect()->back()->with('error', "Cập nhật thất bại!!");
	}
	public function adminNCCAdd(Request $request){
		$name = $request->name;
		$nation = $request->nation;
		$ncc = new nhacungcap();
		$result = $ncc->createNCC($name,$nation);
		if($result){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");
	}
	public function adminNCCEdit(Request $request){
		$name = $request->name;
		$nation = $request->nation;
		$id = $request->id;
		$ncc = new nhacungcap();
		$result = $ncc->updateNCC($id,$name,$nation);
		if($result){
			return redirect()->back()->with('success', "Cập nhật thành công!!");
		}
		return redirect()->back()->with('error', "Cập nhật thất bại!!");
	}

	public function adminNSXDel($id){
		$nsx = new nhasanxuat();
		$del = $nsx->delNSX($id);
		if($del){
			return redirect()->back()->with('success', "Xóa thành công!!");
		}
		return redirect()->back()->with('error', "Xóa thất bại!!");
	}
	public function adminNCCDel($id){
		$ncc = new nhacungcap();
		$del = $ncc->delNCC($id);
		if($del){
			return redirect()->back()->with('success', "Xóa thành công!!");
		}
		return redirect()->back()->with('error', "Xóa thất bại!!");
	}
// Order - Đơn Hàng
	public function adminOrder(Request $request){
		$donhang = new donhang();
		$data['allOrder'] = $donhang->getAllOrder(10);
		$data['allOrderCheck'] = $donhang->getAllOrderChecked(10);
		$data['allOrderUncheck'] = $donhang->getAllOrderUncheck(10);
		return view('admin.order',$data);
	}
	public function admincheckOut(Request $request){
		$donhang = new donhang();
		$id = $request->id;
		$status = $request->status;
		$result = $donhang->updateStatus($id,$status);
		if($result){
			return redirect()->back()->with('success', "Duyệt thành công!!");
		}
		return redirect()->back()->with('error', "Duyệt thất bại!!");

	}

	public function adminProdEdit(Request $request){
		$id = $request->id;
		$hanghoa = new hanghoa();
		$lohang = new lohang();
		$loaihang = new loaihang();
		$nsx = new nhasanxuat();
		$ncc = new nhacungcap();
		$dactinh = new dactinh();
		$ctdt = new chitietdactinh();
		$data['getAllLoHang'] = $lohang->getAllLoHang();
		$data['getAllType'] = $loaihang->getAllType();
		$data['getAllDatTinh'] = $dactinh->getAllDatTinh();
		$data['allNSX'] = $nsx->getAllNSX();
		$data['allNCC'] = $ncc->getAllNCC();
		$data['prod'] = $hanghoa->getProdByID($id);
		$data['allTSKT'] = $ctdt->getCTDTByHH($id);
		// dd($data['prod']);
		return view('admin.product_edit',$data);
	}

	public function adminDacTinh(Request $request){
		$dactinh = new dactinh();
		$data['allDacTinh'] = $dactinh->getAllPaginate(10);
		return view("admin.dactinh",$data);
	}

	public function adminDacTinhDel($id){
		$dactinh = new dactinh();
		$result = $dactinh->deleteDacTinh($id);

		if($result){
			return redirect()->back()->with('success', "Xóa thành công!!");
		}
		return redirect()->back()->with('error', "Xóa thất bại!!");
	}

	public function adminDacTinhAdd(Request $request){
		$name = $request->name_c;

		$dactinh = new dactinh();

		$create = $dactinh->createDacTinh($name);

		if($create){
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		return redirect()->back()->with('error', "Thêm mới thất bại!!");
	}

	public function adminDacTinhEdit(Request $request){

		$id = $request->id_e;
		$name = $request->name_e;

		$dactinh = new dactinh();
		$update = $dactinh->updateDacTinh($id,$name);
		if($update){
			return redirect()->back()->with('success', "Cập nhật thành công!!");
		}
		return redirect()->back()->with('error', "Cập nhật thất bại!!");
	}

	public function getAllPost(Request $request){
		$post = new tintuc();

		$data['allPosts'] = $post->getAllPosts();
		// dd($data);

		return view('admin.tintuc',$data);

	}

	public function getPost(Request $request){
		return view('admin.tintuc_add');
	}

	public function createPost(Request $request){

		$tieude = $request->tieude;
		$noidung = $request->noidung;
		$file = $request->file('file');
		$idNV = Session()->get('ss_nv_id');

		$name = 'assets/images/posts/'.time().'_'.'.'.$file->extension();
		//move file into folder product
		$file->move(public_path().'/assets/images/posts/', $name);  
		
		//create model
		$post = new tintuc();

		$post->createPost($tieude,$noidung,$name,$idNV);

    	return redirect()->back()->with('success', "Thêm mới thành công!!");
	}

	public function adminPostEdit(Request $request){
		$id = $request->id;
		$tieude = $request->tieude;
		$noidung = $request->noidung;
		
		$post = new tintuc();
		if($request->hasfile('file')){
			$file = $request->file('file');
			$name = 'assets/images/posts/'.time().'_'.'.'.$file->extension();
			$post->updateTinAvatar($tieude,$noidung,$name,$id);
			$file->move(public_path().'/assets/images/posts/', $name);  
			return redirect()->back()->with('success', "Thêm mới thành công!!");
		}
		$post->updateTin($tieude,$noidung,$id);

		return redirect()->back()->with('success', "Thêm mới thành công!!");
	}

	public function editPost(Request $request){
		$id = $request->id;
		$post = new tintuc();
		$data['getDetailPost'] = $post->getDetailPost($id);

		return view('admin.tintuc_edit',$data);
	}

	public function adminPostDel(Request $request){
		$id = $request->id;
		$post = new tintuc();
		$post->deletePost($id);
		return redirect()->back()->with('success', "Xóa bài viết thành công!!");
	}

}
