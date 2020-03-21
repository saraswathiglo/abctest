<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'tblroles';
	protected $primaryKey = 'RoleId';
	public $timestamps = false;
	protected $fillable = [
    	'RoleName',
    ];

    /*public function users()
    {
        return $this->belongsToMany('App\User');
    }*/
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /*public function features() {
        return $this->belongsTo('App\Rolefeatures')->get();
    }*/
}
