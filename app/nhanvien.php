<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class nhanvien extends Authenticatable
{
    use Notifiable;
    protected $table = "nhanvien";
    public $primaryKey = "nv_ma";

    // Relationship
	public function loainhanvien()
	{
		return $this->belongsTo('App\loainhanvien', 'lnv_ma');
	}
	public function lohang()
	{
		return $this->belongsTo('App\lohang', 'lohang_id','lohang_id');
    }

    protected $fillable = [
        'email', 'password',
    ];

    public function getAllNV($paginate){
        $data = nhanvien::with('loainhanvien')
        ->get();
        return $data;
    }

    public function createNV($name,$sdt,$lnv,$diachi,$email,$password){
        $create = new nhanvien();
        $create->nv_hoten = $name;
        $create->nv_diachi = $diachi;
        $create->nv_sdt = $sdt;
        $create->lnv_ma = $lnv;
        $create->email = $email;
        $create->password = bcrypt($password);
        $create->save();
    }
    public function changeInfo($name,$sdt,$lnv,$diachi,$id){
        $update = nhanvien::where('nv_ma',$id)
            ->update([
                "nv_hoten"=>$name,
                "lnv_ma"=>$lnv,
                "nv_diachi"=>$diachi,
                "nv_sdt"=>$sdt,
            ]);
        if($update){
            return true;
        }
        return false;
    }
    
    public function changePwd($id, $password){
        $update = nhanvien::find($id)
            ->update([
                "password"=>bcrypt($password)
            ]);
        if($update){
            return true;
        }
        return false;
    }
}
