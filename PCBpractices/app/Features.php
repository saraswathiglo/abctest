<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $table = 'tblfeatures';
	protected $primaryKey = 'FeatureId';
	public $timestamps = false;
	protected $fillable = [
    	'FeatureId', 'FeatureName',
    ];
}
