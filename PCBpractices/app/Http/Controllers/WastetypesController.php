<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;
use Validator;
use Auth;
use DB;

class WastetypesController extends Controller
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
        $wastetypes = DB::table('lookupentity')->where('GroupId',5)->where('Status',1)->get(); //5 waste types
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $wastetypes, 'message'=> 'Success']);
        }else{
            return view('wastetypes.index', compact('wastetypes'));
        }
    }
    public function show($DistrictId)
    {
        //return District::where('DistrictId', $DistrictId)->firstOrFail();
    }
    public function create()
    {
        return view('wastetypes.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'EntityName' => ['required', 'unique:lookupentity'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $wastetypeid = DB::table('lookupentity')->insertGetId(['EntityName' => $request->EntityName, 'GroupId' => 5]);
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $wastetypeid,
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
            $wastetypeid = DB::table('lookupentity')->insertGetId(['EntityName' => $request->EntityName, 'GroupId' => 5]);
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $wastetypeid,
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
        $editwastetype = DB::table('lookupentity')->where('EntityId', $EntityId)->where('GroupId', 5)->where('Status', 1)->first();
        return view('wastetypes.edit', compact('editwastetype'));
    }
    public function update(Request $request, $EntityId)
    {
    	$validator = Validator::make($request->all(), 
            [
                'EntityName' => ['required'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $wastetypeid = DB::table('lookupentity')->where('EntityId', $EntityId)->where('GroupId', 5)->update(['EntityName' => $request->EntityName]);
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
            $wastetypeid = DB::table('lookupentity')->where('EntityId', $EntityId)->where('GroupId', 5)->update(['EntityName' => $request->EntityName]);
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
        $wastetype = DB::table('lookupentity')->where('EntityId', $EntityId)->where('GroupId', 5);
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
