<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'tbladdress';
	
	protected $fillable = [
    	'UId','ConcatNo','EmailId','Address','VillageId',
    ];
}
