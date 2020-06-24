<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class lohang extends Model
{
    protected $table = "lohang";
	protected $primaryKey = 'lh_ma';
    
// Relationship
	public function chitietlohang()
	{
	return $this->hasMany('App\chitietlohang', 'lh_ma','lh_ma')->with('hanghoa');
	}
	public function nhanvien()
	{
		return $this->belongsTo('App\nhanvien', 'nv_ma');
	}
// Filter query
	public function filterLohangTen($query, $value)
	{
		return $query->where('lohang_ten', 'LIKE', '%' . $value . '%');
	}
	public function filterLohangTrigia($query, $value)
	{
    // Convert string(array) to array
    $array = array_map('intval', json_decode($value));
		return $query->whereBetween('lh_trigia' , $array);
	}
	public function filterLohangNgaynhap($query, $value)
	{
		return $query->whereBetween('lh_ngaynhap' , $array);
  	}
  	public function getAllLoHang(){
  		return lohang::all();
  	}
  	public function createLoHang($name,$des,$date,$price,$ncc,$nsx,$nv_ma){
        $create = new lohang();
        $create->lh_ten = $name;
        $create->lh_mota = $des;
        $create->lh_ngaynhap = $date;
        $create->lh_trigia = $price;
        $create->nsx_ma = $nsx;
        $create->ncc_ma = $ncc;
        $create->nv_ma = $nv_ma;
        $create->save();
        return $create->lh_ma;
    }

    public function getDetailLoHang($paginate){
    	$data = lohang::with('chitietlohang')
    	->with('nhanvien')
    	->get();
    	return $data;
    }
}
