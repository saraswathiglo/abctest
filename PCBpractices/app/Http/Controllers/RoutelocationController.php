<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Routelocation;
use App\Route;
use App\Logs;
use Auth;
use Validator;
use DB;

class RoutelocationController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	$routes = Route::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $routes, 'message'=> 'Success']);
        }else{
            return view('routelocations.index', compact('routes'));
        }
    }
    public function create()
    {
        $routes = Route::where('Status',1)->get();
        /*$existedlocations = Routelocation::select(DB::raw("BranchId"))->get()->map(function ($item, $key) {
                return $item['BranchId'];
            })->toArray();
        dd($existedlocations);*/

        $wastegenerators = DB::table('tblbranchs as ob')
            ->join('tblorganizations as o', 'o.OrgId', '=', 'ob.OrgId')
            ->join('lookupentity as le', 'o.OrgTypeId', '=', 'le.EntityId')
            ->join('lookupgroups as lg', 'le.GroupId', '=', 'lg.GroupId')
            ->whereNotIn('ob.BranchId', Routelocation::select(DB::raw("BranchId"))->get()->map(function ($item, $key) {
                return $item['BranchId'];
            })->toArray())
            ->select('ob.*')->where('lg.GroupId','=',3) // 3 = waste generators
            ->get();
        return view('routelocations.create', ['routes' => $routes, 'wastegenerators' => $wastegenerators]);
    }
    public function store(Request $request)
    {
    	$locations = $request->locations;
        $RouteId = $request->route_name;
        foreach($locations as $branchid)
        {
            $inputdata = array(
                'RouteId' => $RouteId,
                'BranchId' => $branchid['loc_id'],
            );
            $route_location = DB::table('tblroutelocations')->where($inputdata)->get();
            if($route_location->count() == 0){
            	DB::table('tblroutelocations')->insert($inputdata);
            }
        }
        return json_encode(['data'=>'true']);
    }
    public function edit($RouteId)
    {
        $routes = Route::where('Status',1)->get();
        $wastegenerators = DB::table('tblbranchs as ob')
            ->join('tblorganizations as o', 'o.OrgId', '=', 'ob.OrgId')
            ->join('lookupentity as le', 'o.OrgTypeId', '=', 'le.EntityId')
            ->join('lookupgroups as lg', 'le.GroupId', '=', 'lg.GroupId')
            ->whereNotIn('ob.BranchId', Routelocation::select(DB::raw("BranchId"))->get()->map(function ($item, $key) {
                return $item['BranchId'];
            })->toArray())
            ->select('ob.*')->where('lg.GroupId','=',3) // 3 = waste generators
            ->get();
        $editroute = Routelocation::where('RouteId', $RouteId)->first();
        $editbranches = Routelocation::where('RouteId', $RouteId)->join('tblbranchs as b', 'tblroutelocations.BranchId', '=','b.BranchId')->get();
        return view('routelocations.edit', compact('routes', 'wastegenerators', 'editroute', 'editbranches'));
    }
    public function update(Request $request, $RouteId)
    {
        $locations = $request->locations;
        $RouteId = $request->route_name;
        foreach($locations as $branchid)
        {
            $inputdata = array(
                'RouteId' => $RouteId,
                'BranchId' => $branchid['loc_id'],
            );
            $route_location = DB::table('tblroutelocations')->where($inputdata)->get();
            if($route_location->count() == 0){
                DB::table('tblroutelocations')->insert($inputdata);
            }
        }
        return json_encode(['data'=>'true']);
    }
    public function destroy($BranchId)
    {
        $routelocation = Routelocation::where('BranchId', $BranchId);
        $routelocation->delete();
        return json_encode(['data'=>'true']);
    }
}
