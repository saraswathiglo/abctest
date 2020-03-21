<?php

namespace App\Http\Controllers;

//use DB;
use Illuminate\Http\Request;
use App\Taluka;
use App\District;
use App\Logs;
use Validator;
use Auth;

class TalukaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions:taluka,view', ['only' => ['index','show']]);
        $this->middleware('permissions:taluka,create', ['only' => ['store']]);
        $this->middleware('permissions:taluka,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:taluka,delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $talukas = Taluka::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $talukas, 'message'=> 'Success']);
        }else{
            return view('taluka.index', compact('talukas'));
        }
    }
    public function show($TalukaId)
    {
        return Taluka::where('TalukaId', $TalukaId)->firstOrFail();
    }
    public function create()
    {
        $districts = District::where('Status',1)->get();
        return view('taluka.create', compact('districts'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'DistrictId' => ['required',],
                'TalukaName' => ['required', 'unique:tbltaluka'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $taluka = Taluka::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $taluka->TalukaId,
                'TableId' => 31,
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
            $taluka = Taluka::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $taluka->TalukaId,
                'TableId' => 31,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($TalukaId)
    {
        $districts = District::where('Status',1)->get();
        $edittaluka = Taluka::where('TalukaId', $TalukaId)->first();
        return view('taluka.edit', compact('districts', 'edittaluka'));
    }
    public function update(Request $request, $TalukaId)
    {
        $updatedata = array(
            'DistrictId' => $request->DistrictId,
            'TalukaName' => $request->TalukaName,
        );
        Taluka::where('TalukaId', $TalukaId)->update($updatedata);
        $taluka = Taluka::where('TalukaId', $TalukaId)->firstOrFail();
        $uid = Auth::id();
        $loginput = [
            'RecordId' => $TalukaId,
            'TableId' => 31,
            'TypeId' => 3,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $taluka, 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Updated!');
        }
    }
    public function delete(Request $request, $TalukaId)
    {
        $taluka = Taluka::where('TalukaId', $TalukaId);
        $taluka->update(['Status' => 2]);

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $TalukaId,
            'TableId' => 31,
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
