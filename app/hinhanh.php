<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinhanh extends Model
{
    protected $table = "hinhanh";
	protected $primaryKey = "ha_id";

  //fillable
  protected $fillable = ['ha_url'];

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

  // Relationship
    public function hinhanhhanghoa()
	{
	    return $this->hasMany('App\hinhanhhanghoa', 'ha_id','ha_id');
    }
    public function createHA($url){
    	$hinhanh = new hinhanh();
    	$hinhanh->ha_url = $url;
    	$hinhanh->save();
    	return $hinhanh->ha_id;
    }
    public function delHA($id){
    	hinhanh::where('ha_id',$id)
    	->delete();
    }

}
