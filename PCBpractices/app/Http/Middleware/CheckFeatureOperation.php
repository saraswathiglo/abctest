<?php

namespace App\Http\Middleware;

use Closure;
use App\Operations;
use App\Rolefeatures;
use Auth;

class CheckFeatureOperation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
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
        //return $next($request);
    }
}
