<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'tbllogs';
	protected $fillable = [
    	'RecordId', 'TableId', 'Dated'
    ];
}
