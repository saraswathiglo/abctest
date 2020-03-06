<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'tblvillages';
    protected $fillable = [
    	'PanchayteeId', 'VillageName',
    ];
}
