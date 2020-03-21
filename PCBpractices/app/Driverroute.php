<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driverroute extends Model
{
    protected $table = 'tbldriverroutes';
	protected $primaryKey = 'AssignmentId';
    public $timestamps = false;
    protected $fillable = [
        'UId', 'VehicleId', 'RouteId', 'AssignedDate', 'AssignedTime', 'AssignedBy', 'DriverRouteFromDate', 'DriverRouteFromTime', 'DriverRouteToDate', 'DriverRouteToTime'
    ];
}
