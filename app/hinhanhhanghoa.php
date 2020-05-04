<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinhanhhanghoa extends Model
{
	protected $table = "hinhanhhanghoa";
	protected $primaryKey = ['ha_id','hh_ma'];
	public $incrementing = false;

		//fillable
	protected $fillable = ["ha_id","hh_ma"];
	protected $guarded = [];
	
	// Relationship
	public function hinhanh()
	{
		return $this->belongsTo('App\hinhanh', 'ha_id','ha_id');
	}
	public function hanghoa()
	{
		return $this->belongsTo('App\hanghoa', 'hh_ma','hh_ma');
	}


	public function createHAHH($hh_ma,$ha_id){
		$create = new hinhanhhanghoa();
		$create->hh_ma = $hh_ma;
		$create->ha_id = $ha_id;
		$create->save();
	}
}
