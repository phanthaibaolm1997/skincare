<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaikhachhang extends Model
{
    protected $table = "loaikhachhang";
	public $primaryKey = "lkh_ma";
    protected $fillable = ['lkh_ten'];
	// relationship
    public function khachhang()
    {
        return $this->hasMany('App\khachhang', 'kh_ma');
    }

    public function getAllLKH(){
    	$data = loaikhachhang::all();
    	return $data;
    }

    public function getLKHbyID($loai){
        return loaikhachhang::where('lkh_ma',$loai)->first();
    }
}
