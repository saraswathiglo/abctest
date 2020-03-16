<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $table = 'tbldistricts';
	protected $primaryKey = 'DistrictId';
    public $timestamps = false;
    protected $fillable = [
        'DistrictName','StateId',
    ];

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
