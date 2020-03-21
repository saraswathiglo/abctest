<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'tblvillages';
    protected $primaryKey = 'VillageId';
    public $timestamps = false;
    protected $fillable = [
    	'PanchayteeId', 'VillageName',
    ];
}
