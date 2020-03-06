<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblpanchaytee extends Model
{
	protected $table = 'tblpanchaytee';

	protected $fillable = [
		'PanchayteeName','DistrictId','TalukaId'
	];
}
