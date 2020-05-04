<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class lohang extends Model
{
    protected $table = "lohang";
	protected $primaryKey = 'lh_ma';
	public $incrementing = false;

// Filter Scope
	public function scopeFilter($query, $param)
	{
		foreach ($param as $field => $value) {
			$method = 'filter' . Str::studly($field);
			if ($value === '') {
				continue;
			}
			if (method_exists($this, $method)) {
				$data = $this->{$method}($query, $value);
				continue;
			}
			if (empty($this->filterable) || !is_array($this->filterable)) {
				continue;
			}
			if (in_array($field, $this->filterable)) {
				$query->where($this->table . '.' . $field, $value);
				continue;
			}
			if (key_exists($field, $this->filterable)) {
				$query->where($this->table . '.' . $this->filterable[$field], $value);
				continue;
			}
		}

		return $query;
	}

//fillable
    protected $fillable = [
		'lh_ngaynhap', 'lh_ten', "lh_trigia", "lh_mota" 
    ];
    
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
        if($create){
            return true;
        }
        return false;
    }

    public function getDetailLoHang($paginate){
    	$data = lohang::with('chitietlohang')
    	->with('nhanvien')
    	->get();
    	return $data;
    }
}
