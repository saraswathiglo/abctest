<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'tbllogs';
    protected $primaryKey = 'LogId';
    public $timestamps = false;
	protected $fillable = [
    	'RecordId', 'TableId', 'Dated'
    ];
}
