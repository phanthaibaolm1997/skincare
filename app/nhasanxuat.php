<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class nhasanxuat extends Model
{
    protected $table = "nhasanxuat";
    public $primaryKey = "nsx_id";

    //fillable
    protected $fillable = ['nsx_ten'];

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
	public function filterNsxTen($query, $value)
	{
		return $query->where('nsx_ten', 'LIKE', '%' . $value . '%');
	}
    // Relationship
	public function getAllNSX(){
		return nhasanxuat::get();
	}
	public function createNSX($name,$nation){
        $create = new nhasanxuat();
        $create->nsx_ten = $name;
        $create->save();
        if($create){
            return true;
        }
        return false;
    }
    public function updateNSX($id,$name,$nation){
        
        $update = nhasanxuat::find($id)
            ->update([
                "nsx_ten"=>$name
            ]);
        if($update){
            return true;
        }
        return false;
    }
    public function delNSX($id){
        $del = nhasanxuat::find($id)->delete();
        if($del){
            return true;
        }
        return false;
    }
   
}
