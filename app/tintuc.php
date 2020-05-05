<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    protected $table = "tintuc";
    public $primaryKey = "tintuc_ma";

    // Quan hệ
    public function nhanvien()
	{
		return $this->belongsTo('App\nhanvien', 'nv_ma');
	}

	//TRuy vấn

	public function getAllPosts(){
		return tintuc::with('nhanvien')->get();
	}

	public function createPost($tieude,$noidung,$avatar,$id){
		$create = new tintuc();
		$create->tin_ten = $tieude;
		$create->tin_noidung = $noidung;
		$create->tin_avatar = $avatar;
		$create->nv_ma = $id;
		$create->save();
	}

	public function getDetailPost($id){
		return tintuc::where('tin_ma',$id)->first();
	}

	public function updateTinAvatar($tieude,$noidung,$name,$id){
		tintuc::where('tin_ma',$id)->update([
			'tin_ten'=>$tieude,
			'tin_noidung'=>$noidung,
			'tin_avatar'=>$name
		]);
	}
	public function updateTin($tieude,$noidung,$id){
		tintuc::where('tin_ma',$id)->update([
			'tin_ten'=>$tieude,
			'tin_noidung'=>$noidung
		]);
	}

	public function deletePost($id){
		tintuc::where('tin_ma',$id)->delete();
	}

	public function getTinTucHome($paginate){
		$data = tintuc::with('nhanvien')
			->take($paginate)->get();
		return $data;
	}

	public function recomPost($number){
		$data = tintuc::with('nhanvien')
			->take($number)
			->get();
		return $data;
	}
}
