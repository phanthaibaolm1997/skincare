<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loainhanvien extends Model
{
    protected $table = "loainhanvien";
    public $primaryKey = "lnv_ma";

    public function getAllLNV(){
    	$data = loainhanvien::all();
    	return $data;
    }
}
