<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	protected $table = 'tblorganizations';
    protected $fillable = [
    	'OrgName', 'OrgTypeId',
    ];
}
