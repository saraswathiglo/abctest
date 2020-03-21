<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	protected $table = 'tblorganizations';
	public $timestamps = false;
    protected $fillable = [
    	'OrgName', 'OrgTypeId',
    ];
}
