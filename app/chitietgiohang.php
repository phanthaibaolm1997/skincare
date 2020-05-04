<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietgiohang extends Model
{
	protected $table = "chitietgiohang";
    protected $primaryKey = ['hh_ma','gh_id'];
	public $incrementing = false;

	//fillable
	protected $fillable = [
	'ctgh_soluong', 'ctgh_dongia', 
	];
		
	// Relationship
	public function giohang(){
		 return $this->belongsTo('App\giohang', 'gh_id','gh_id');
	}
	public function hanghoa(){
		 return $this->belongsTo('App\hanghoa', 'hh_ma','hh_ma');
	}
	//Query

	public function createOrUpdateCart($gh_id,$hh_ma,$quality,$price){ 
		$data = chitietgiohang::where([
			'hh_ma'=>$hh_ma,
			'gh_id'=>$gh_id
		])->first();
		//if cart doesn't exitest, create cart
		if ($data !== null) {
   		$quality = ($data->ctgh_soluong + $quality);
			chitietgiohang::where([
				'hh_ma'=>$hh_ma,
				'gh_id'=>$gh_id
			])->update(['ctgh_soluong'=>$quality]);
		}
		//when cart  exitest, update cart = (quality update) + quality
		else{
			chitietgiohang::insert([
   			"gh_id"=>$gh_id,
   			"hh_ma"=>$hh_ma,
   			"ctgh_soluong"=>$quality,
   			"ctgh_dongia"=>$price,
   		]);
			
		}
	}
	public function deleteCart($hh_ma,$gh_id){
		chitietgiohang::where([
				'hh_ma'=>$hh_ma,
				'gh_id'=>$gh_id
			])->delete();
	}
}
