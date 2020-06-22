<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    protected $table = "giohang";
	public $primaryKey = "gh_id";

	// relationship
	public function khachhang()
   	{
       return $this->belongsTo('App\khachhang', 'kh_ma');
	}
	public function chitietgiohang()
	{
	return $this->hasMany('App\chitietgiohang', 'gh_id')->with('hanghoa');
	}

	//Query
	public function getCart($kh_ma){
		return giohang::firstOrCreate(['kh_ma' => $kh_ma]);
	}
	public function getDetailCart($kh_ma){
		$data = giohang::with('khachhang')
			->with('chitietgiohang')
			->where('giohang.kh_ma','=',$kh_ma)
			->firstOrFail();
		return $data;
	}
	
	
}
