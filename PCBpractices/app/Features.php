<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Features extends Model
{
    protected $table = 'tblfeatures';
	protected $primaryKey = 'FeatureId';
	public $timestamps = false;
	protected $fillable = [
    	'FeatureId', 'FeatureName',
    ];

    public function submenufeatures($FeatureTypeId) {
        return $this->where('FeatureType', 'SubMenu')->where('FeatureTypeId', $FeatureTypeId)->get();
    }
}
