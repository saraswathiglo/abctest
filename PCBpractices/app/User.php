<?php
 
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tblusers';
    protected $primaryKey = 'UId';
    public $timestamps = false;
    /*protected $fillable = [
        'name', 'email', 'password', 'api_token',
    ];*/
    protected $fillable = [
        'DisplayName', 'EmailId', 'Password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/
    protected $hidden = [
        'Password', 'RememberToken',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->Password;
    }

    public function getEmailAttribute() {
        return $this->attributes['EmailId'];
    }

    public function setEmailAttribute($value) {
        $this->attributes['EmailId'] = $value;
    }


    public function roles()
    {
        return $this->belongsTo('App\Role');
        //return $this->belongsToMany('App\Role');
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($role)
    {
        /*if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;*/

        if (Role::where('RoleName', $role)->first()) {
            return true;
        }
        return false;
    }

    public function checkrolefeatureoperation($UId, $FeatureId, $OperationId)
    {
        if($user = User::select('RoleId')->where('UId', $UId)->first())
        {
            $RoleId = $user->RoleId;
            if(Rolefeatures::where(['RoleId' => $RoleId, 'FeatureId' => $FeatureId, 'OperationId' => $OperationId])->first())
            {
                return 1;
            }
            return 0;
        }
        return 0;

        /*
          public function handle($request, Closure $next, $features, $operations)
    {
        $oper = Operations::where('OperationName',$operations)->first();        
        $role = Auth::user()->RoleId;
        $featur = Rolefeatures::where('RoleId',$role)
        ->where('OperationId','=', $oper->OperationId)
        ->join('tblfeatures', function ($join) use($features,$oper) {
            $join->on('tblfeatures.FeatureId', '=', 'tblrolefeatures.FeatureId')
                 ->where('tblfeatures.FeatureName','=', $features);
        })
        ->first();
        if ($featur) {
            return $next($request);
        }
        return redirect()->back();
       
    }
}



        */
    }
}
