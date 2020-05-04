<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class nhacungcap extends Model
{
    protected $table = "nhacungcap";
    public $primaryKey = "ncc_id";

    //fillable
    protected $fillable = ['ncc_ten, qg_ma'];

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
    
	// Filter query
	public function filterNccTen($query, $value)
	{
		return $query->where('ncc_ten', 'LIKE', '%' . $value . '%');
	}
    public function filterQgId($query, $value)
	{
		return $query->where('qg_ma' , $value);
    }
    
    //Relationship
	public function getAllNCC(){
		return nhacungcap::all();
	}
	public function createNCC($name,$nation){
        $create = new nhacungcap();
        $create->ncc_ten = $name;
        $create->qg_ma = $nation;
        $create->save();
        if($create){
            return true;
        }
        return false;
    }
    public function updateNCC($id,$name,$nation){
        
        $update = nhacungcap::where('ncc_id',$id)
            ->update([
                "ncc_ten"=>$name,
                "qg_ma"=>$nation
            ]);
        if($update){
            return true;
        }
        return false;
    }
    public function delNCC($id){
        $del = nhacungcap::where('ncc_id',$id)->delete();
        if($del){
            return true;
        }
        return false;
    }
}
