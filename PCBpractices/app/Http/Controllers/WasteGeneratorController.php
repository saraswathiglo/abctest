<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Organization;
use App\Logs;
use Validator;
use Auth;
use DB;

class WasteGeneratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:Waste_Generator');
    }
    public function index(Request $request)
    {
        //return view('wastegenerator.home');
        $wastegenerators = Organization::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $wastegenerators, 'message'=> 'Success']);
        }else{
            return view('wastegenerator.index', compact('wastegenerators'));
        }
    }

    public function show()
    {
        //return District::where('DistrictId', $DistrictId)->firstOrFail();
    }
    public function create(Request $request)
    {
    	//DB::enableQuerylog();

    	/*$wastegentypes = DB::table('lookupentity')
            ->join('lookupgroups', 'lookupentity.GroupId', '=', 'lookupgroups.GroupId')
            ->where('lookupgroups.GroupId', 3) //
            ->select('lookupentity.*', 'lookupgroups.GroupName')
            ->get(); */
        $wastegenerators = DB::table('vw_lookup_groups')->where('GroupId', 3)->get(); // 3 = Waste generator
        $organizations = Organization::where('Status', 1)->get();
        $wastetypes = DB::table('vw_lookup_groups')->where('GroupId', 5)->get(); // 5 Waste Types
        $wasteschedules = DB::table('vw_lookup_groups')->where('GroupId', 6)->get(); // 6 Schedules
        //$wastegenerators = Organization::where('Status',1)->get();
        return view('wastegenerator.create', compact('wastegenerators', 'organizations', 'wastetypes', 'wasteschedules'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'OrgTypeId' => ['required',],
                //'OrgId' => ['required_without:OrgName',],
                'OrgName' => ['required', 'unique:tblorganizations'],
                'DisplayName' => ['required',],
                'EmailId' => ['required', 'unique:tblusers'],
                'ContactNo' => ['required',],
                'Location' => ['required',],
                'Latitude' => ['required',],
                'Longitude' => ['required',],
                'WasteSchedule' => ['required',],
                //'WasteTypes' => ['required',],
            ]
        );
        $inputuserdata = array(
        	'UserId' => $request->EmailId,
        	'Password' =>  Hash::make($request->EmailId),
        	'DisplayName' => $request->DisplayName,
        	'RoleId' => 7, // waste generator
        	'ContactNo' => $request->ContactNo,
        	'EmailId' => $request->EmailId,
        );
        
        
        $uid = Auth::id();
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
        }else{
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $OrgId = DB::table('tblusers')->insertGetId($inputuserdata); // UId from users is OrgId in organizations
            $loginputuser = [
                'RecordId' => $OrgId,
                'TableId' => 1,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginputuser);
            //$inputorgdata['OrgId'] = $OrgId;
            //$inputbranchdata['OrgId'] = $OrgId;
            $inputorgdata = array(
	        	'OrgId' => $OrgId, // user id from users table
	        	'OrgName' => $request->OrgName,
	        	'OrgTypeId' => $request->OrgTypeId,
	        );
	        //dd($inputorgdata);
            //$org = Organization::create($inputorgdata);
            $org = DB::table('tblorganizations')->insert($inputorgdata);
            $loginputorg = [
                'RecordId' => $OrgId,
                'TableId' => 12,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginputorg);

            $inputbranchdata = array(
	        	'OrgId' => $OrgId, // user id from users table
	        	'BranchName' => $request->OrgName,
	        	'EntityId' => $request->OrgTypeId,
	        	'Latitude' => $request->Latitude,
	        	'Longitude' => $request->Longitude,
	        	'Location' => $request->Location,
	        	'WasteSchedule' => $request->WasteSchedule,
	        	'Schedule' => implode(',', $request->scheduledays),
	        );
            $BranchId = DB::table('tblbranchs')->insertGetId($inputbranchdata);
            $loginputorgbranch = [
                'RecordId' => $BranchId,
                'TableId' => 13,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginputorgbranch);

            if(isset($request->WasteTypes)){
            	foreach ($request->WasteTypes as $WasteTypeId) {
            		$orgwastetype = DB::table('tblorgwastetypes')->insertGetId(['BranchId' => $BranchId, 'EntityId' => $WasteTypeId]);

            		$loginputorgbranch = [
		                'RecordId' => $orgwastetype,
		                'TableId' => 14,
		                'TypeId' => 2,
		                'Dated' => Date('Y-m-d H:i:s'),
		                'LogBy' => $uid,
		            ];
		            $logs = Logs::insert($loginputorgbranch);
            	}
            }            
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit(Request $request, $OrgId)
    {
    	$wastegenerators = DB::table('vw_lookup_groups')->where('GroupId', 3)->get(); // 3 = Waste generator
        $organizations = Organization::where('OrgId',$OrgId)->where('Status', 1)->get();
        $wastetypes = DB::table('vw_lookup_groups')->where('GroupId', 5)->get(); // 5 Waste Types
        $wasteschedules = DB::table('vw_lookup_groups')->where('GroupId', 6)->get(); // 6 Schedules
        return view('wastegenerator.edit', compact('wastegenerators', 'organizations', 'wastetypes', 'wasteschedules'));
    }

}
