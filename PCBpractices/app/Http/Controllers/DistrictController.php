<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\State;
use App\Logs;
use Validator;
use Auth;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:Transporter');
        //$this->middleware('permissions:index');
         //$this->middleware('permissions:product-create', ['only' => ['create','store']]);
         //$this->middleware('permissions:product-edit', ['only' => ['edit','update']]);
        // $this->middleware('permissions:product-delete', ['only' => ['destroy']]);
        $this->middleware('permissions:districts,view', ['only' => ['index','show']]);
        $this->middleware('permissions:districts,create', ['only' => ['store']]);
        $this->middleware('permissions:districts,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:districts,delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $districts = District::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $districts, 'message'=> 'Success']);
        }else{
            return view('districts.index', compact('districts'));
        }
    }
    public function show($DistrictId)
    {
        return District::where('DistrictId', $DistrictId)->firstOrFail();
    }
    public function create()
    {
        $states = State::where('Status',1)->get();
        return view('districts.create', compact('states'));
    }
    public function store(Request $request)
    {
        //$district = District::create($request->all());
       // return response()->json($district, 201);
        $validator = Validator::make($request->all(), 
            [
                'StateId' => ['required',],
                'DistrictName' => ['required', 'unique:tbldistricts'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $district = District::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $district->DistrictId,
                'TableId' => 8,
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
            $district = District::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $district->DistrictId,
                'TableId' => 8,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($DistrictId)
    {
        $states = State::where('Status',1)->get();
        $editdistrict = District::where('DistrictId', $DistrictId)->first();
        return view('districts.edit', compact('states', 'editdistrict'));
    }
    public function update(Request $request, $DistrictId)
    {
        $updatedata = array(
            'StateId' => $request->StateId,
            'DistrictName' => $request->DistrictName,
        );
        District::where('DistrictId', $DistrictId)->update($updatedata);
        $district = District::where('DistrictId', $DistrictId)->firstOrFail();
        $uid = Auth::id();
        $loginput = [
            'RecordId' => $DistrictId,
            'TableId' => 8,
            'TypeId' => 3,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $district, 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Updated!');
        }
    }
    public function destroy(Request $request, $DistrictId)
    {
        $district = District::where('DistrictId', $DistrictId);
        //$district->delete();
        $district->update(['Status' => 2]);

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $DistrictId,
            'TableId' => 8,
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
