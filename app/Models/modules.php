<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modules extends Model
{
    //use HasFactory;
	 public function component()
    {
        return $this->hasMany(Components::class);
    }
}
