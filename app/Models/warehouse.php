<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class warehouse extends Model
{
	use SoftDeletes;
	 protected $dates = [ 'deleted_at' ];
   protected $fillable = ['warehouse_name', 'project_id', 'state_id','client_id','vendoradmin_id'];
}
