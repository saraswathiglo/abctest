<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Logs;
use Validator;
use Auth;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions:states,view', ['only' => ['index','show']]);
        $this->middleware('permissions:states,create', ['only' => ['store']]);
        $this->middleware('permissions:states,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:states,delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $states = State::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $states, 'message'=> 'Success']);
        }else{
            return view('states.index', compact('states'));
        }
    }
    public function show($StateId)
    {
        return State::where('StateId', $StateId)->firstOrFail();
    }
    public function create()
    {
        return view('states.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'StateName' => ['required', 'unique:tblstates'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $state = State::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $state->StateId,
                'TableId' => 9,
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
            $state = State::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $state->StateId,
                'TableId' => 9,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
        //$states = State::create($request->all());
        //return response()->json($states, 201);
    }
    public function edit($StateId)
    {
        $editstate = State::where('StateId', $StateId)->first();
        return view('states.edit', compact('editstate'));
    }
    public function update(Request $request, $StateId)
    {
        $updatedata = array(
            'StateName' => $request->StateName,
        );
        State::where('StateId', $StateId)->update($updatedata);
        $state = State::where('StateId', $StateId)->firstOrFail();
        $uid = Auth::id();
        $loginput = [
            'RecordId' => $StateId,
            'TableId' => 9,
            'TypeId' => 3,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $state, 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Updated!');
        }
        //$state = State::findOrFail($StateId);
        //$state->update($request->all());
       // State::where('StateId', $StateId)->update($request->all());
       // $state = State::where('StateId', $StateId)->firstOrFail();
       // return response()->json($state,200);
    }
    public function destroy(Request $request, $StateId)
    {
        $state = State::where('StateId', $StateId);
        $state->update(['Status' => 2]);

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $StateId,
            'TableId' => 9,
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
