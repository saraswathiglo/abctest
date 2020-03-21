<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taluka extends Model
{
    protected $table = 'tbltaluka';
    protected $primaryKey = 'TalukaId';
    public $timestamps = false;	
	protected $fillable = [
    	'TalukaName','DistrictId',
    ];
}
