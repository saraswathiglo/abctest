<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featureoperations extends Model
{
    protected $table = 'tblfeatureoperations';
	//protected $primaryKey = 'FeatureId';
	public $timestamps = false;
	protected $fillable = [
    	'FeatureId','OperationId',
    ];

    /*public function rolefeature()
    {
    	return $this->belongsTo('App\Featureoperations');
    }*/
}
