<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    protected $table = 'tbloperations';
	protected $primaryKey = 'OperationId';
	public $timestamps = false;
	protected $fillable = [
    	'OperationName',
    ];
}
