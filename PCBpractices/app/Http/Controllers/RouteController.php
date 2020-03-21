<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Logs;
use Auth;
use Validator;
use DB;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       /* $this->middleware('permissions:districts,view', ['only' => ['index','show']]);
        $this->middleware('permissions:districts,create', ['only' => ['store']]);
        $this->middleware('permissions:districts,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:districts,delete', ['only' => ['destroy']]);*/
    }

    public function index(Request $request)
    {
        $routes = Route::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $routes, 'message'=> 'Success']);
        }else{
            return view('routes.index', compact('routes'));
        }
    }
    public function show(Request $request, $RouteId)
    {
    	/*DB::enableQuerylog();
        $route_locations = DB::table('tblroutes as r')
            ->join('tblroutelocations as rl','r.RouteId','=','rl.RouteId')
            ->join('tblbranchs as b','rl.BranchId','=','b.BranchId')            
            ->where('r.Status','=',1)
            ->where('b.Status','=',1)
            ->select('r.*','b.*')->get();
            print_r(DB::getQuerylog());*/
        //$routes = Route::where('RouteId', $RouteId)->where('Status',1)->get();
        $route_locations = DB::table('vw_route_locations')->where('RouteId', $RouteId)->get();
        return view('routes.view', compact('route_locations'));
        
    }
    public function create()
    {
    	return view('routes.create');

        /*$routes = Route::where('Status',1)->get();
        $wastegenerators = DB::table('tblbranchs as ob')
            ->join('tblorganizations as o', 'o.OrgId', '=', 'ob.OrgId')
            ->join('lookupentity as le', 'o.OrgTypeId', '=', 'le.EntityId')
            ->join('lookupgroups as lg', 'le.GroupId', '=', 'lg.GroupId')
            ->select('ob.*')->where('lg.GroupId','=',3) // 3 = waste generators
            ->get();
        return view('routes.create', ['routes' => $routes, 'wastegenerators' => $wastegenerators]);*/

        //$states = State::where('Status',1)->get();
        //return view('districts.create', compact('states'));
    }
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), 
            [
                'RouteName' => ['required','unique:tblroutes'],
                'StartPoint' => ['required'],
                'StartPointLatitude' => ['required'],
                'StartPointLongitude' => ['required'],
                'EndPoint' => ['required'],
                'EndPointLatitude' => ['required'],
                'EndPointLongitude' => ['required'],
            ]
        );
        $inputdata = array(
    		'RouteName' => $request->RouteName,
            'StartPoint' => $request->StartPoint,
            'StartPointLatitude' => $request->StartPointLatitude,
            'StartPointLongitude' => $request->StartPointLongitude,
            'EndPoint' => $request->EndPoint,
            'EndPointLatitude' => $request->EndPointLatitude,
            'EndPointLongitude' => $request->EndPointLongitude,
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $routeid = DB::table('tblroutes')->insertGetId($inputdata);
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $routeid,
                'TableId' => 11,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return response()->json(['status'=>'success', 'result' => [], 'message'=> 'Success']);
        }else{
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $routeid = DB::table('tblroutes')->insertGetId($inputdata);
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $routeid,
                'TableId' => 11,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($RouteId)
    {
        $editroute = Route::where('Status',1)->where('RouteId',$RouteId)->first();
        return view('routes.edit', compact('editroute'));
    }
    public function update(Request $request, $RouteId)
    {
        $validator = Validator::make($request->all(), 
            [
                'RouteName' => ['required'],
                'StartPoint' => ['required'],
                'StartPointLatitude' => ['required'],
                'StartPointLongitude' => ['required'],
                'EndPoint' => ['required'],
                'EndPointLatitude' => ['required'],
                'EndPointLongitude' => ['required'],
            ]
        );
        $updatedata = array(
    		'RouteName' => $request->RouteName,
            'StartPoint' => $request->StartPoint,
            'StartPointLatitude' => $request->StartPointLatitude,
            'StartPointLongitude' => $request->StartPointLongitude,
            'EndPoint' => $request->EndPoint,
            'EndPointLatitude' => $request->EndPointLatitude,
            'EndPointLongitude' => $request->EndPointLongitude,
        );
        Route::where('RouteId', $RouteId)->update($updatedata);
        $uid = Auth::id();
        $loginput = [
            'RecordId' => $RouteId,
            'TableId' => 11,
            'TypeId' => 3,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => [], 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Updated!');
        }
    }
    public function destroy(Request $request, $RouteId)
    {
        $route = Route::where('RouteId', $RouteId);
        $route->update(['Status' => 2]);

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $RouteId,
            'TableId' => 11,
            'TypeId' => 4,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);

        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => [], 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Deleted!');
        }
    }


}
