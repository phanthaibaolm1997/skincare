<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhgia extends Model
{
    protected $table = "danhgia";
	public $primaryKey = "dg_ma";

	public $timestamps = false;

	//Relation
	public function khachhang()
	{
		return $this->belongsTo('App\khachhang', 'kh_ma');
	}


	// Truy vấn
	public function postDanhGia($id,$kh,$text,$star){
		$create = new danhgia();
		$create->dg_noidung = $text;
		$create->dg_star = $star;
		$create->kh_ma = $kh;
		$create->hh_ma = $id;
		$create->save();
	}

	public function getComment($id){
		$data = danhgia::with('khachhang')
			->where('hh_ma',$id)
			->orderBy('dg_ma', 'desc')
			->take(5)->get();
		return $data;
	}
}
