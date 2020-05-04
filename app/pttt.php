<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pttt extends Model
{
    protected $table = "phuongthucthanhtoan";
    public $primaryKey = "pttt_ma";

    //fillable
    protected $fillable = ['pttt_ten'];

    // relationship

    public function getPTTT(){
    	return pttt::all();
    }
    
}
