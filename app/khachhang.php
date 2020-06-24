<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class khachhang extends Authenticatable {
	use Notifiable;
	protected $table = "khachhang";
	public $primaryKey = "kh_ma";
	protected $fillable = [
		'email', 'password', 'kh_ten','kh_gioitinh','kh_diachi','kh_sdt'
	];
	// Relationship
	public function loaikhachhang()
	{
		return $this->belongsTo('App\loaikhachhang', 'lkh_ma');
	}
	public function giohang()
	{
		return $this->hasMany('App\giohang', 'kh_ma')->with('chitietgiohang');
	}
	public function donhang()
	{
		return $this->hasMany('App\donhang' ,'kh_ma')->with('chitietdonhang');
	}
	public function danhgia()
    {
        return $this->hasMany('App\danhgia', 'kh_ma');
    }

	public function getAllKH($paginate){
        $data = khachhang::with('donhang')
        ->with('loaikhachhang')
        ->get();
        return $data;
    }
	
   	// Query
	public function getInfoKH($id){
		return khachhang::with('loaikhachhang')
        ->with('giohang.chitietgiohang.hanghoa.hinhanhhanghoa.hinhanh')
        ->with('donhang.chitietdonhang.hanghoa')
        ->with('danhgia')
		->where("kh_ma",$id)
		->first();
	}
	public function create($name,$address,$phone,$gender,$email,$password){
        $create = new khachhang();
        $create->kh_ten = $name;
        $create->kh_gioitinh = $gender;
        $create->kh_diachi = $address;
        $create->kh_sdt = $phone;
        $create->email = $email;
		$create->password = bcrypt($password);
		$create->lkh_ma = 1;
		$create->tt_ma = 1;
        $create->save();
    }

    public function ongChamChi(){
        return khachhang::with(['donhang','loaikhachhang'])
        ->get();
    }

    public function addCoin($id, $coin){
        khachhang::where('kh_ma',$id)
        ->update(['kh_coin'=> $coin]);
    }
    public function updateLKH($id, $loai){
    	khachhang::where('kh_ma',$id)
    	->update(['lkh_ma'=> $loai]);
    }

    public function changeInfo($name,$sdt,$lkh,$diachi,$id,$birthday){
        $update = khachhang::where('kh_ma',$id)
            ->update([
                "kh_ten"=>$name,
                "lkh_ma"=>$lkh,
                "kh_diachi"=>$diachi,
                "kh_sdt"=>$sdt,
                "kh_ngaysinh"=>$birthday
            ]);
        if($update){
            return true;
        }
        return false;
    }
    
    public function changePwd($id, $password){
        $update = khachhang::find($id)
            ->update([
                "password"=>bcrypt($password)
            ]);
        if($update){
            return true;
        }
        return false;
    }
}
