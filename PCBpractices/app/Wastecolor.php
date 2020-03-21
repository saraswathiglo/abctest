<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wastecolor extends Model
{
    protected $table = 'tblwastecolors';
	protected $primaryKey = 'WasteColorId';
    public $timestamps = false;
    protected $fillable = [
        'EntityId', 'WasteColor',
    ];
}
