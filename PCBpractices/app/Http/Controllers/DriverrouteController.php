<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driverroute;
use App\Route;
use App\User;
use App\Logs;
use DB;
use Validator;
use Auth;

class DriverrouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /*$this->middleware('permissions:districts,view', ['only' => ['index','show']]);
        $this->middleware('permissions:districts,create', ['only' => ['store']]);
        $this->middleware('permissions:districts,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:districts,delete', ['only' => ['destroy']]);*/
    }

    public function index(Request $request)
    {
        $driverroutes = Driverroute::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $driverroutes, 'message'=> 'Success']);
        }else{
            return view('driverroutes.index', compact('driverroutes'));
        }
    }
    public function show($AssignmentId)
    {
        //return District::where('DistrictId', $DistrictId)->firstOrFail();
    }
    public function create()
    {
    	$routes = Route::where('Status',1)->get();
        $drivers = User::where('RoleId', 6)->where('Status',1)->get(); // 6 Driver or Transporter
        $vehicles = DB::table('tblvehicles')->where('Status',1)->get();
        return view('driverroutes.create', compact('routes', 'drivers', 'vehicles'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'UId' => ['required',],
                'VehicleId' => ['required'],
                'RouteId' => ['required'],
                'DriverRouteFromDate' => ['required'],
                'DriverRouteFromTime' => ['required'],
                'DriverRouteToDate' => ['required'],
                'DriverRouteToTime' => ['required'],
            ]
        );
        $uid = Auth::id();
        $inputdata = array(
        	'UId' => $request->UId,
        	'VehicleId' => $request->VehicleId,
        	'RouteId' => $request->RouteId,
        	'AssignedDate' => Date('Y-m-d'),
        	'AssignedTime' => Date('H:i:s'),
        	'AssignedBy' => $uid,
        	'DriverRouteFromDate' => $request->DriverRouteFromDate,
        	'DriverRouteFromTime' => $request->DriverRouteFromTime,
        	'DriverRouteToDate' => $request->DriverRouteToDate,
        	'DriverRouteToTime' => $request->DriverRouteToTime,
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $driverroute = Driverroute::create($inputdata);
            $loginput = [
                'RecordId' => $driverroute->AssignmentId ,
                'TableId' => 43,
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
            $driverroute = Driverroute::create($inputdata);
            $loginput = [
                'RecordId' => $driverroute->AssignmentId ,
                'TableId' => 43,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($AssignmentId)
    {
        $routes = Route::where('Status',1)->get();
        $drivers = User::where('RoleId', 6)->where('Status',1)->get(); // 6 Driver or Transporter
        $vehicles = DB::table('tblvehicles')->where('Status',1)->get();
        $editdriverroute = Driverroute::where('AssignmentId',$AssignmentId)->where('Status',1)->first();
        return view('driverroutes.edit', compact('routes', 'drivers', 'vehicles', 'editdriverroute'));
    }
    public function update(Request $request, $AssignmentId)
    {
    	$validator = Validator::make($request->all(), 
            [
                'UId' => ['required',],
                'VehicleId' => ['required'],
                'RouteId' => ['required'],
                'DriverRouteFromDate' => ['required'],
                'DriverRouteFromTime' => ['required'],
                'DriverRouteToDate' => ['required'],
                'DriverRouteToTime' => ['required'],
            ]
        );
        $uid = Auth::id();
        $updatedata = array(
        	'UId' => $request->UId,
        	'VehicleId' => $request->VehicleId,
        	'RouteId' => $request->RouteId,
        	'AssignedDate' => Date('Y-m-d'),
        	'AssignedTime' => Date('H:i:s'),
        	'AssignedBy' => $uid,
        	'DriverRouteFromDate' => $request->DriverRouteFromDate,
        	'DriverRouteFromTime' => $request->DriverRouteFromTime,
        	'DriverRouteToDate' => $request->DriverRouteToDate,
        	'DriverRouteToTime' => $request->DriverRouteToTime,
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            Driverroute::where('AssignmentId', $AssignmentId)->where('ScheduleStatus', 1)->update($updatedata);
            $loginput = [
                'RecordId' => $AssignmentId,
                'TableId' => 43,
                'TypeId' => 3,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return response()->json(['status'=>'success', 'result' => [], 'message'=> 'Success']);
        }else{
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            Driverroute::where('AssignmentId', $AssignmentId)->where('ScheduleStatus', 1)->update($updatedata);
            $loginput = [
                'RecordId' => $AssignmentId,
                'TableId' => 43,
                'TypeId' => 3,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record updated!');
        }
    }
    public function destroy(Request $request, $AssignmentId)
    {
        $driverroute = Driverroute::where('AssignmentId', $AssignmentId);
        $driverroute->update(['Status' => 2]);
        $uid = Auth::id();
        $loginput = [
            'RecordId' => $AssignmentId,
            'TableId' => 43,
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
