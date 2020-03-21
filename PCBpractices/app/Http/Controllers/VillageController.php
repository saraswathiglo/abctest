<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Village;
use App\Panchayatee;
use App\Logs;
use Validator;
use Auth;
use DB;

class VillageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions:village,view', ['only' => ['index','show']]);
        $this->middleware('permissions:village,create', ['only' => ['store']]);
        $this->middleware('permissions:village,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:village,delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $villages = Village::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $villages, 'message'=> 'Success']);
        }else{
            return view('village.index', compact('villages'));
        }
    }
    public function show($VillageId)
    {
        //$village = Village::where('VillageId', $VillageId)->firstOrFail();
        //return response()->json(['success'=>'success', 'village' => $village], 200);
    }
    public function create()
    {
        $panchaytees = Panchayatee::where('Status',1)->get();
        return view('village.create', compact('panchaytees'));
    }
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), 
            [ 
                'VillageName' => ['required', 'max:255'],
                'PanchayteeId' => ['required'],
            ]
        );
        $inputdata = array(
            'VillageName' => $request->VillageName,
            'PanchayteeId' => $request->PanchayteeId,
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $village = Village::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $village->VillageId,
                'TableId' => 33,
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
            $village = Village::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $village->VillageId,
                'TableId' => 33,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($VillageId)
    {
        $panchaytees = Panchayatee::where('Status',1)->get();
        $editvillage = Village::where('VillageId', $VillageId)->first();
        return view('village.edit', compact('panchaytees', 'editvillage'));
    }
    public function update(Request $request, $VillageId)
    {
        $updatedata = array(
            'VillageName' => $request->VillageName,
            'PanchayteeId' => $request->PanchayteeId,
        );
        Village::where('VillageId', $VillageId)->update($updatedata);
        $village = Village::where('VillageId', $VillageId)->firstOrFail();
        $uid = Auth::id();
        $loginput = [
            'RecordId' => $VillageId,
            'TableId' => 33,
            'TypeId' => 3,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);
        if($request->ajax()) {
            return response()->json(['status'=>'success', 'result' => $village, 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Updated!');
        }

    	/*$validator = Validator::make($request->all(), 
            [ 
                'VillageName' => ['required', 'max:255'],
                'PanchayteeId' => ['required'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'VillageName' => $request->VillageName,
            'PanchayteeId' => $request->PanchayteeId,
        );
        Village::where('VillageId', $VillageId)->update($updatedata);
        $village = Village::where('VillageId', $VillageId)->firstOrFail();
        return response()->json(['success'=>'success', 'village' => $village], 200);*/
    }
    public function delete(Request $request, $VillageId)
    {
        $village = Village::where('VillageId', $VillageId);
        $village->update(['Status' => 2]);

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $VillageId,
            'TableId' => 33,
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
