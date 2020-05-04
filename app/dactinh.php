<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dactinh extends Model
{
    protected $table = "dactinh";
	public $primaryKey = "dt_ma";

	// protected $fillable = [
	// 	'dh_ma','kh_ma'
	// ];

	//Relation
	public function chitietdactinh()
	{
		return $this->hasMany('App\chitietdactinh', 'dt_ma','dt_ma');
	}
	
	//Query
	public function getAllDatTinh(){
		return dactinh::all();
	}
	public function getAllPaginate($paginate){
        return dactinh::paginate($paginate);
    }

    public function deleteDacTinh($id){
    	$data =  dactinh::where('dt_ma',$id)->delete();
    	if ($data) {
    		return true;
    	}
    	return false;
    }

    public function createDacTinh($name){
        $create = new dactinh();
        $create->dt_ten = $name;
        $create->save();
        if($create){
            return true;
        }
        return false;
    }

    public function updateDacTinh($id,$name){
        $update = dactinh::where('dt_ma',$id)
            ->update([
                "dt_ten"=>$name
            ]);
        if($update){
            return true;
        }
        return false;
    }
}
