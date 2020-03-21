<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;
use App\Wastecolor;
use Validator;
use Auth;
use DB;

class WastecolorsController extends Controller
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
        $wastecolors = Wastecolor::all();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $wastecolors, 'message'=> 'Success']);
        }else{
            return view('wastecolors.index', compact('wastecolors'));
        }
    }
    public function show()
    {
    }
    public function create()
    {
    	$wastetypes = DB::table('lookupentity')->where('GroupId',5)->where('Status',1)->get(); //5 waste types
        return view('wastecolors.create', compact('wastetypes'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'EntityId' => ['required', 'unique:tblwastecolors'],
                'WasteColor' => ['required', 'unique:tblwastecolors'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $wastecolor = Wastecolor::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $wastecolor->WasteColorId,
                'TableId' => 37,
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
            $wastecolor = Wastecolor::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $wastecolor->WasteColorId,
                'TableId' => 37,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($WasteColorId)
    {
    	$wastetypes = DB::table('lookupentity')->where('GroupId',5)->where('Status',1)->get(); //5 waste types
        $editwastecolor = Wastecolor::where('WasteColorId', $WasteColorId)->first();
        return view('wastecolors.edit', compact('wastetypes', 'editwastecolor'));
    }
    public function update(Request $request, $WasteColorId)
    {
    	$validator = Validator::make($request->all(), 
            [
                'EntityId' => ['required',],
                'WasteColor' => ['required',],
            ]
        );
        $updatedata = array(
        	'EntityId' => $request->EntityId,
        	'WasteColor' => $request->WasteColor,
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            Wastecolor::where('WasteColorId', $WasteColorId)->update($updatedata);
        	$wastecolor = Wastecolor::where('WasteColorId', $WasteColorId)->firstOrFail();
            $uid = Auth::id();
	        $loginput = [
	            'RecordId' => $WasteColorId,
	            'TableId' => 37,
	            'TypeId' => 3,
	            'Dated' => Date('Y-m-d H:i:s'),
	            'LogBy' => $uid,
	        ];
	        $logs = Logs::insert($loginput);
	        return response()->json(['status'=>'success', 'result' => $wastecolor, 'message'=> 'Success']);

        }else{
        	if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            Wastecolor::where('WasteColorId', $WasteColorId)->update($updatedata);
        	$wastecolor = Wastecolor::where('WasteColorId', $WasteColorId)->firstOrFail();
            $uid = Auth::id();
	        $loginput = [
	            'RecordId' => $WasteColorId,
	            'TableId' => 37,
	            'TypeId' => 3,
	            'Dated' => Date('Y-m-d H:i:s'),
	            'LogBy' => $uid,
	        ];
	        $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Updated!');
        }
    }
    public function destroy(Request $request, $WasteColorId)
    {
        $wastecolor = Wastecolor::where('WasteColorId', $WasteColorId);
        $wastecolor->delete();

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $WasteColorId,
            'TableId' => 37,
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
