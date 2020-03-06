<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbldistrict extends Model
{
    protected $fillable = [
        'DistrictName','StateId',
    ];
}
