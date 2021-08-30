<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class components extends Model
{
	//protected $guarded = [];
    //use HasFactory;
	
	 public function module()
    {
        return $this->belongsTo(Modules::class);
    } 
}
