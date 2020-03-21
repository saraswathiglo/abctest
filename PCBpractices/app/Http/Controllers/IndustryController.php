<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;
use Validator;
use Auth;
use DB;

class IndustryController extends Controller
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
        $industrytypes = DB::table('vw_lookup_groups')->whereIn('GroupId',[3,4])->where('Status',1)->get(); //3 waste generator, 4 plants
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $industrytypes, 'message'=> 'Success']);
        }else{
            return view('industrytypes.index', compact('industrytypes'));
        }
    }
    public function show($DistrictId)
    {
        //return District::where('DistrictId', $DistrictId)->firstOrFail();
    }
    public function create()
    {
        return view('industrytypes.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'GroupId' => ['required'],
                'EntityName' => ['required', 'unique:lookupentity'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $industrytypeid = DB::table('lookupentity')->insertGetId(['EntityName' => $request->EntityName, 'GroupId' => $request->GroupId]);
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $industrytypeid,
                'TableId' => 34,
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
            $industrytypeid = DB::table('lookupentity')->insertGetId(['EntityName' => $request->EntityName, 'GroupId' => $request->GroupId]);
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $industrytypeid,
                'TableId' => 34,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($EntityId)
    {
        $editindustrytype = DB::table('lookupentity')->where('EntityId', $EntityId)->whereIn('GroupId',[3,4])->where('Status', 1)->first();
        return view('industrytypes.edit', compact('editindustrytype'));
    }
    public function update(Request $request, $EntityId)
    {
    	$validator = Validator::make($request->all(), 
            [
            	'GroupId' => ['required'],
                'EntityName' => ['required'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $industrytype = DB::table('lookupentity')->where('EntityId', $EntityId)->update(['EntityName' => $request->EntityName, 'GroupId' => $request->GroupId]);
            $uid = Auth::id();
	        $loginput = [
	            'RecordId' => $EntityId,
	            'TableId' => 34,
	            'TypeId' => 3,
	            'Dated' => Date('Y-m-d H:i:s'),
	            'LogBy' => $uid,
	        ];
	        $logs = Logs::insert($loginput);
	        return response()->json(['status'=>'success', 'result' => $district, 'message'=> 'Success']);

        }else{
        	if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $industrytype = DB::table('lookupentity')->where('EntityId', $EntityId)->update(['EntityName' => $request->EntityName, 'GroupId' => $request->GroupId]);
            $uid = Auth::id();
	        $loginput = [
	            'RecordId' => $EntityId,
	            'TableId' => 34,
	            'TypeId' => 3,
	            'Dated' => Date('Y-m-d H:i:s'),
	            'LogBy' => $uid,
	        ];
	        $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Updated!');
        }
    }
    public function destroy(Request $request, $EntityId)
    {
        $wastetype = DB::table('lookupentity')->where('EntityId', $EntityId)->whereIn('GroupId', [3,4]);
        $wastetype->update(['Status' => 2]);

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $EntityId,
            'TableId' => 34,
            'TypeId' => 4,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);

        if($request->ajax()) {
            return response()->json(['status'=>'success', 'result' => [], 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Deleted!');
        }
    }
}
