<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaihang extends Model
{
    protected $table = "loaihang";
	protected $primaryKey = "ma_lh";

    //fillable
    protected $fillable = [
		'lh_ten', 'mota_lh'
    ];

    // relationship
    public function hanghoa()
    {
        return $this->hasMany('App\hanghoa', 'ma_lh', 'ma_lh')
        ->with('hinhanhhanghoa');
    }

    //Query
    public function getAllLoaiHang(){
        return loaihang::all();
    }

    public function getProdOfCat(){
        return loaihang::with("hanghoa")->get();
    }
    public function getAllPaginate($paginate){
        return loaihang::paginate($paginate);
    }
    public function updateCat($id,$name,$description){
        $update = loaihang::where('ma_lh',$id)
            ->update([
                "ten_lh"=>$name,
                "mota_lh"=>$description
            ]);
        if($update){
            return true;
        }
        return false;
    }
    public function delCat($id){
        $del = loaihang::find($id)->delete();
        if($del){
            return true;
        }
        return false;
    }
    public function createCat($name,$des){
        $create = new loaihang();
        $create->ten_lh = $name;
        $create->mota_lh = $des;
        $create->save();
        if($create){
            return true;
        }
        return false;
    }
    public function getAllType(){
        return loaihang::all();
    }

}
