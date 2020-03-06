<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbltaluka extends Model
{
	protected $table = 'tbltaluka';
	
	protected $fillable = [
    	'TalukaName','DistrictId',
    ];
}
