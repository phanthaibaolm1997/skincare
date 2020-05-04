<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class congtacvien extends Authenticatable {
	use Notifiable;
	protected $table = "congtacvien";
	public $primaryKey = "ctv_id";
	protected $fillable = [
		'email', 'password', 'ctv_hovaten','ctv_gioitinh','ctv_diachi','ctv_sdt'
	];
    // Relationship
	public function loaictv()
	{
		return $this->belongsTo('App\loaictv', 'lctv_id');
	}
	public function lohang()
	{
		return $this->belongsTo('App\lohang', 'lohang_id','lohang_id');
    }
    
    //Query
    public function create($name,$address,$phone,$gender,$email,$password){
        $defaut_lctv = 1;
        $create = new congtacvien();
        $create->ctv_hovaten = $name;
        $create->ctv_gioitinh = $gender;
        $create->ctv_diachi = $address;
        $create->ctv_sdt = $phone;
        $create->email = $email;
        $create->password = bcrypt($password);
        $create->lctv_id = $defaut_lctv;
        $create->save();
    }
}
