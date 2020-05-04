<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
	protected $table = "donhang";
	public $primaryKey = "dh_ma";

	protected $fillable = [
		'dh_ma','kh_ma', 'htvc_ma','nv_ma', 'pttt_ma', 'dh_ghichu', 'dh_nguoinhan', 'dh_diachi', 'dh_sdt', 'nv_ma'
	];

	public function khachhang()
   	{
       return $this->belongsTo(khachhang::class, 'kh_ma','kh_ma');
	}
	public function chitietdonhang()
	{
		return $this->hasMany('App\chitietdonhang', 'dh_ma','dh_ma')->with('hanghoa');
	}
	public function pttt()
	{
		return $this->belongsTo('App\pttt', 'pttt_ma','pttt_ma');
	}

	// Query
	public function createDH($dh_nguoinhan,$dh_diachi,$dh_sdt,$dh_ghichu,$pttt,$kh_ma){
		$donhang = new  donhang();
		$donhang->dh_nguoinhan = $dh_nguoinhan;
		$donhang->dh_diachi=$dh_diachi;
		$donhang->dh_sdt=$dh_sdt;
		$donhang->dh_ghichu=$dh_ghichu;
		$donhang->pttt_ma=$pttt;
		$donhang->kh_ma=$kh_ma;
		// $donhang->dh_ngaydat= date('Y-m-d');
		$donhang->save();
		return $donhang->dh_ma;
	}
	public function getAllOrderCheck($paginate){
		$data = donhang::with('khachhang')
		->with('chitietdonhang')
		->with('chitietdonhang.hanghoa.hinhanhhanghoa')
		->with('pttt')
		->paginate($paginate);
		return $data;

	}
	public function getAllOrder($paginate){
		$data = donhang::where('dh_trangthai',0)
		->with('khachhang')
		->with('chitietdonhang')
		->with('chitietdonhang.hanghoa.hinhanhhanghoa')
		->with('pttt')
		->paginate($paginate);
		return $data;
	}
	public function getAllOrderChecked($paginate){
		$data = donhang::where('dh_trangthai',1)
		->with('khachhang')
		->with('chitietdonhang')
		->with('chitietdonhang.hanghoa.hinhanhhanghoa')
		->with('pttt')
		->paginate($paginate);
		return $data;
	}
	public function getAllOrderUncheck($paginate){
		$data = donhang::where('dh_trangthai',2)
		->with('khachhang')
		->with('chitietdonhang')
		->with('chitietdonhang.hanghoa.hinhanhhanghoa')
		->with('pttt')
		->paginate($paginate);
		return $data;
	}
	public function updateStatus($id,$status){
		$data = donhang::where('dh_ma',$id)
		->update([
			'dh_trangthai'=>$status
		]);
		if($data){
			return true;
		}
		return false;
	}
	public function getOrderByKH($id){
		$data = donhang::where('kh_ma',$id)
		->with('khachhang')
		->with('chitietdonhang')
		->with('chitietdonhang.hanghoa.hinhanhhanghoa')
		->with('pttt')
		->get();
		return $data;
	}

	public function detailDHByKH($id){
		$data = donhang::where('kh_ma',$id)
		->with('chitietdonhang')
		->get();
		return $data;
	}

	public function getDonHangByDate($date){
		$data = donhang::where('dh_ngaylap',$date)
			->with('chitietdonhang')->get();
		return $data;
	}
}
