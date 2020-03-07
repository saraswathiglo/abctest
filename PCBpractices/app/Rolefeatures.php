<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolefeatures extends Model
{
    protected $table = 'tblrolefeatures';
	//protected $primaryKey = 'RoleId';
	public $timestamps = false;
	protected $fillable = [
    	'RoleId', 'FeatureId', 'OperationId',
    ];
}
