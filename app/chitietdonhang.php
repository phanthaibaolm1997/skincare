<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    protected $table = "chitietdonhang";
    protected $primaryKey = ['hh_ma','dh_ma'];
	public $incrementing = false;

	//fillable
	protected $fillable = [
	'ctdh_soluong', 'ctdh_dongia', 
	];
		
	// Relationship
	public function donhang(){
		 return $this->belongsTo('App\donhang', 'dh_ma','dh_ma');
	}
	public function hanghoa(){
		 return $this->belongsTo('App\hanghoa', 'hh_ma','hh_ma');
	}

	// Query
	public function createDetailDH($dh_ma, $hh_ma, $dongia, $soluong){
		 chitietdonhang::insert([
				'dh_ma'=>$dh_ma,
				'hh_ma'=>$hh_ma,
				'ctdh_dongia'=>$dongia,
				'ctdh_soluong'=>$soluong
			]);
	}
}
