<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panchayatee extends Model
{
    protected $table = 'tblpanchaytee';
	protected $primaryKey = 'PanchayteeId ';
	public $timestamps = false;
	protected $fillable = [
    	'PanchayteeName', 'TalukaId',
    ];

}
