<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class TransporterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:Transporter');
    }
    public function index()
    {
        return view('transporter.home');
    }

    public function transporterroute()
    {
    	$user = new User();
    	$FeatureId = 28;
    	$OperationId = 1;
    	$result = [];
    	$checkpermission = $user->checkrolefeatureoperation(Auth::id(), $FeatureId, $OperationId);
        if(Auth::id() && $checkpermission) {
            $uid = Auth::id();
            $today = Date('Y-m-d');
            /*DB::enableQuerylog();
            $assignroute = DB::table('tbldriverroutes as dr')
                ->join('tblusers as u','dr.UId','=','u.UId')
                ->join('tblvehicles as v','dr.VehicleId','=','v.VehicleId')
                ->join('tblroutelocations as rl','dr.RouteId','=','rl.RouteId')
                ->join('tblbranchs as b','rl.BranchId','=','b.BranchId')            
                ->where('dr.Status','=',1)->where('v.Status','=',1)
                ->where('b.Status','=',1)->where('u.Status','=',1)
                ->where('dr.UId','=',$uid)->where('dr.StartDate', $today)
                ->select('u.DisplayName','v.VehicleName', 'v.VehicleNumber','b.BranchName','b.Latitude','b.Longitude','b.Location', 'b.BranchId', 'dr.AssignmentId', 'dr.StartDate', 'dr.StartTime')->get();                
                print_r(DB::getQuerylog());*/
            $assignroute = DB::table('vw_driver_routes')->where('UId', $uid)->where('StartDate', $today)->get();

            $locations = []; $i = 0;
            if(count($assignroute) > 0){
                foreach ($assignroute as $row) {
                	$locations[$i]['BranchId'] = $row->BranchId;
                    $locations[$i]['BranchName'] = $row->BranchName;
                    $locations[$i]['Latitude'] = $row->Latitude;
                    $locations[$i]['Longitude'] = $row->Longitude;
                    $locations[$i]['Location'] = $row->Location;                

                    $result = array( 'DisplayName' => $row->DisplayName,
                        'VehicleName' => $row->VehicleName,
                        'VehicleNumber' => $row->VehicleNumber,
                        'AssignmentId' => $row->AssignmentId,
                        'StartDate' => $row->StartDate,
                        'StartTime' => $row->StartTime,
                        'UId' => $uid,
                        'locations' => $locations,
                    );
                    $i++;
                }
                return response()->json(['status'=>'success', 'result' => $result, 'message' => 'Success']);
            }
            return response()->json(['status'=>'failed', 'result' => $result, 'message' => 'Route Not Assigned.']);
        }
        return response()->json(['status'=>'failed', 'result' => $result, 'message' => 'Invalid User']);
    }


    public function wastepickups(Request $request)
    {
    	$AssignmentId = 1;
    	$BranchId = 2;
    	$UId = 6;
    	$EntityId = 6; // Waste type id from lookupentity tbl 5,6,7
    	$ArrivedDateTime = Date('Y-m-d H:i:s');
    	$PickedUpDateTime = Date('Y-m-d H:i:s');
    	$QrCode = rand(10000,1000000);
    	$Weight = rand(1,5);

    	$requestdata = array(
    		'AssignmentId' => $AssignmentId,
    		'BranchId' => $BranchId,
    		'UId' => $UId,
    		'EntityId' => $EntityId,
    		'ArrivedDateTime' => $ArrivedDateTime,
    		'PickedUpDateTime' => $PickedUpDateTime,
    		'QrCode' => $QrCode,
    		'Weight' => $Weight,
    	);
    	$requestid = DB::table('tblpickups')->insertGetId($requestdata);
    	$response = DB::table('tblpickups')->where('PickupId', $requestid)->get();
    	return response()->json(['status'=>'success', 'result' => $response, 'message' => 'Success']);
    }







}
