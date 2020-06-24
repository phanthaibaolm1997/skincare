<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietlohang extends Model
{
	protected $table = "chitietlohang";
	protected $primaryKey = ['lh_ma','hh_ma'];
	public $incrementing = false;

		//fillable
	protected $fillable = [
		'ctlh_soluong', 'ctlh_dongia', 'ctlh_ngaysx', 'ctlh_hansd',
	];

	// Relationship
	public function lohang()
	{
		return $this->belongsTo('App\lohang', 'lh_ma','lh_ma');
	}
	public function hanghoa()
	{
		return $this->belongsTo('App\hanghoa', 'hh_ma','hh_ma')->with('hinhanhhanghoa');
	}

	public function createCTLH($hh_ma,$lh_ma,$ngaysx,$hansd,$giagoc,$number){
		$create = new chitietlohang();
		$create->hh_ma = $hh_ma;
		$create->lh_ma = $lh_ma;
		$create->ctlh_soluong = $lh_ma;
		$create->ctlh_ngaysx = $ngaysx;
		$create->ctlh_hansd = $hansd;
		$create->ctlh_dongia = $giagoc;
		$create->save();
	}
	public function updateCTLH($hh_ma,$lh_ma,$giagoc,$number){
		chitietlohang::where('hh_ma',$hh_ma)
			->where('lh_ma',$lh_ma)
			->update([
				'ctlh_soluong'=> $number,
				'ctlh_dongia'=> $giagoc,
			]);
	}
	public function getFirst($hh_ma){
		return chitietlohang::where('hh_ma',$hh_ma)
			->with('lohang')
			->first();
	}
}
