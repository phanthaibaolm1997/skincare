<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdactinh extends Model
{
    protected $table = "chitietdactinh";
    protected $primaryKey = ['dt_ma','hh_ma'];
	public $incrementing = false;

	//fillable
	protected $fillable = ['thongso'];

	// Relationship
	public function dactinh(){
		 return $this->belongsTo('App\dactinh', 'dt_ma','dt_ma');
	}
	public function hanghoa(){
		 return $this->belongsTo('App\hanghoa', 'hh_ma','hh_ma');
	}

	// Query
	public function createCTDT($hh_ma,$dt_ma,$thongso){
		chitietdactinh::insert([
				'hh_ma'=>$hh_ma,
				'dt_ma'=>$dt_ma,
				'thongso'=>$thongso,
			]);
	}
	public function getCTDTByHH($id){
		return chitietdactinh::where('hh_ma',$id)
			->with('dactinh')
			->get();
	}
	public function deleteAllbyID($id){
		chitietdactinh::where('hh_ma',$id)->delete();
	}
}
