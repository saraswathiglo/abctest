<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panchayatee;
use App\Taluka;
use App\District;
use App\Logs;
use Validator;
use Auth;
use DB;

class PanchayteeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions:panchayatee,view', ['only' => ['index','show']]);
        $this->middleware('permissions:panchayatee,create', ['only' => ['store']]);
        $this->middleware('permissions:panchayatee,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:panchayatee,delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $panchayatees = Panchayatee::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $panchayatees, 'message'=> 'Success']);
        }else{
            return view('panchayatee.index', compact('panchayatees'));
        }
    }
    public function show($PanchayteeId)
    {
        return Panchayatee::where('PanchayteeId', $PanchayteeId)->firstOrFail();
    }
    public function create()
    {
        $districts = District::where('Status',1)->get();
        $talukas = Taluka::where('Status',1)->get();
        return view('panchayatee.create', compact('districts', 'talukas'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'DistrictId' => ['required',],
                'PanchayteeName' => ['required', 'unique:tblpanchaytee'],
            ]
        );
        $inputdata = array(
            'PanchayteeName' => $request->PanchayteeName,
            'DistrictId' => $request->DistrictId,
            'TalukaId' => $request->TalukaId,
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $panchayateeid = DB::table('tblpanchaytee')->insertGetId($inputdata);
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $panchayateeid,
                'TableId' => 32,
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
            //$panchayatee = Panchayatee::create($inputdata);
            $panchayateeid = DB::table('tblpanchaytee')->insertGetId($inputdata);
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $panchayateeid,
                'TableId' => 32,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($PanchayteeId)
    {
        $districts = District::where('Status',1)->get();
        $talukas = Taluka::where('Status',1)->get();
        $editpanchaytee = Panchayatee::where('PanchayteeId', $PanchayteeId)->first();
        return view('panchayatee.edit', compact('districts','talukas', 'editpanchaytee'));
    }
    public function update(Request $request, $PanchayteeId)
    {
        /*TblPanchayatee::where('PanchayteeId', $PanchayteeId)->update($request->all());
        $panchaytee = TblPanchayatee::where('PanchayteeId', $PanchayteeId)->firstOrFail();
        return response()->json($panchaytee,200);*/
        $updatedata = array(
            'DistrictId' => $request->DistrictId,
            'PanchayteeName' => $request->PanchayteeName,
        );
        Panchayatee::where('PanchayteeId', $PanchayteeId)->update($updatedata);
        $panchaytee = Panchayatee::where('PanchayteeId', $PanchayteeId)->firstOrFail();
        $uid = Auth::id();
        $loginput = [
            'RecordId' => $PanchayteeId,
            'TableId' => 32,
            'TypeId' => 3,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $panchaytee, 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Updated!');
        }
    }
    public function destroy(Request $request, $PanchayteeId)
    {
        $panchaytee = Panchayatee::where('PanchayteeId', $PanchayteeId);
        $panchaytee->update(['Status' => 2]);

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $PanchayteeId,
            'TableId' => 32,
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
