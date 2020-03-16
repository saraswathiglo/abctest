<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'StateName',
    ];
    protected $table = 'tblstates';
	protected $primaryKey = 'StateId';
    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany('App\District');
    }
}
