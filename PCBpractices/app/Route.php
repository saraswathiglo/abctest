<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'tblroutes';
	protected $primaryKey = 'RouteId';
    public $timestamps = false;
    protected $fillable = [
        'RouteName', 'StartPoint', 'EndPoint',
    ];
}
