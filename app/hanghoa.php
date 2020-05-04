<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class hanghoa extends Model
{
	protected $table = "hanghoa";
	public $primaryKey  = "hh_ma";
	// public $incrementing = false;

  	//fillable
	protected $fillable = [
		'hh_ma','hh_ten', 'hh_dongia','hh_mota','ma_lh', 
   ];
   
	// Relationship
	public function chitietgiohang()
	{
		return $this->hasMany('App\chitietgiohang', 'hh_ma','hh_ma');
	}
	public function chitietdactinh()
	{
		return $this->hasMany('App\chitietdactinh', 'hh_ma','hh_ma')->with('dactinh');
	}
	public function chitietlohang()
	{
		return $this->hasMany('App\chitietlohang', 'hh_ma','hh_ma')
		->with('lohang');
	}
	public function loaihang()
	{
		return $this->belongsTo('App\loaihang', 'ma_lh','ma_lh');

	}
	public function hinhanhhanghoa()
	{
		return $this->hasMany('App\hinhanhhanghoa', 'hh_ma','hh_ma')
		->with('hinhanh');
	}


	//Query 
	//get new product
	public function getNewProd($numberProd){
		$data = hanghoa::with('hinhanhhanghoa')
			->orderBy('hanghoa.created_at', 'ASC')
			->take($numberProd)
			->get();
		return $data;
	}

	//get detail product
	public function detailProd($id){
		$data = hanghoa::with('hinhanhhanghoa')
			->with('loaihang')
			->with('chitietdactinh')
			->find($id);
		return $data;
	}

	// get random product
	public function getRandProd($number){
		$data = hanghoa::with('hinhanhhanghoa')
			->inRandomOrder()
			->take($number)
			->get();
		return $data;
	}
	// get recom product by type
	public function recomProd($idtype,$number){
		$data = hanghoa::where('hanghoa.ma_lh','=',$idtype)
			->with('hinhanhhanghoa')
			->take($number)
			->get();
		return $data;
	}
	//add back quality
	public function addBackQuality($hh_ma,$quality){
		$data = hanghoa::where('hh_ma',$hh_ma)->first();
		$number = $data->hh_conlai + $quality;
		hanghoa::where('hh_ma','=',$hh_ma)
			->update(['hh_conlai'=> $number]);
	}
	public function subtractQuality($hh_ma,$quality){
		$data = hanghoa::find($hh_ma)->first();
		$number = $data->hh_conlai - $quality;
		hanghoa::where('hh_ma','=',$hh_ma)
			->update(['hh_conlai'=> $number]);
	}
	// get product by 
	public function getAllProdCat($cat,$number){
		$data = hanghoa::where('hanghoa.ma_lh',$cat)
			->with('hinhanhhanghoa')
			->orderBy('hanghoa.created_at', 'ASC')
			->paginate($number);
		return $data;
	}
	// get product by 
	public function getAllProdProducer($pro,$number){
		$data = hanghoa::with('hinhanhhanghoa')
			->with(['chitietlohang.lohang'=> function($o){
				$o->where('chitietlohang.lohang.nsx_id', '=', 1);
			}])
			->orderBy('hanghoa.created_at', 'ASC')
			->get();
		return $data;
	}
	//get product by 
	public function getAllProdSupplier($sup,$number){
		$data = hanghoa::where('hanghoa.ma_lh',$sup)
			->with('hinhanhhanghoa')
			->with('chitietlohang')
			->orderBy('hanghoa.created_at', 'ASC')
			->paginate($number);
		return $data;
	}
	//
	public function maxPrice(){
		return hanghoa::max('hh_dongia');
	}
	public function minPrice(){
		return hanghoa::min('hh_dongia');
	}

	//filter Prod
	public function filterProd($key,$nsx,$ncc,$type,$price){
		$query = hanghoa::query();
		if(!empty($key)){
			$query->where('hh_ten', 'LIKE', '%' . $key . '%');
		}
		if(!empty($type)){
			$query->whereIn('ma_lh', $type);
		}
		if(!empty($price)){
			$query->whereBetween('hh_dongia',$price);
		}
		return $query->with('hinhanhhanghoa')->get();
	}
	//get all product 
	public function getAllProd($paginate){
		$data = hanghoa::with('hinhanhhanghoa')
			->paginate($paginate);
		return $data;
	}
	public function createProd($name,$des,$number,$price,$type){
		$create = new hanghoa();
		$create->hh_ten = $name;
		$create->hh_dongia = $price;
		$create->hh_conlai = $number;
		$create->hh_mota = $des;
		$create->ma_lh = $type;
		$create->save();

		return $create->hh_ma;
	}
	public function updateProd($id,$name,$des,$number,$price,$type){
		hanghoa::where('hh_ma',$id)
			->update([
				'hh_ten'=> $name,
				'hh_dongia'=> $price,
				'hh_conlai'=> $number,
				'hh_mota'=> $des,
				'ma_lh'=> $type,
			]);
	}
	public function getProdByID($id){
		$data = hanghoa::where('hanghoa.hh_ma',$id)
			->with('hinhanhhanghoa')
			->with('chitietlohang')
			->with('loaihang')
			->first();
		return $data;
	}

}
