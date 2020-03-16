<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Logs;
use Validator;
use Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions:roles,view', ['only' => ['index','show']]);
        $this->middleware('permissions:roles,create', ['only' => ['store']]);
        $this->middleware('permissions:roles,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:roles,delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $roles = Role::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $roles, 'message'=> 'Success']);
        }else{
            return view('roles.index', compact('roles'));
        }
    }
    public function show($RoleId)
    {
        //return Role::where('RoleId', $RoleId)->firstOrFail();
        return Role::where('Status', 1)->find($RoleId);
    }
    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'RoleName' => ['required', 'string', 'max:45', 'unique:tblroles'],
            ]
        );
        if($request->ajax()){
            if ($validator->fails()) {
                return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
            }
            $role = Role::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $role->RoleId,
                'TableId' => 2,
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
            $role = Role::create($request->all());
            $uid = Auth::id();
            $loginput = [
                'RecordId' => $role->RoleId,
                'TableId' => 2,
                'TypeId' => 2,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            return redirect()->back()->with('success', 'Record Added!');
        }
    }
    public function edit($RoleId)
    {
        $editrole = Role::where('RoleId', $RoleId)->first();
        return view('roles.edit', compact('roles', 'editrole'));
    }
    public function update(Request $request, $RoleId)
    {
        $updatedata = array(
            'RoleName' => $request->RoleName,
        );
        Role::where('RoleId', $RoleId)->update($updatedata);
        $role = Role::where('RoleId', $RoleId)->firstOrFail();
        $uid = Auth::id();
        $loginput = [
            'RecordId' => $RoleId,
            'TableId' => 2,
            'TypeId' => 3,
            'Dated' => Date('Y-m-d H:i:s'),
            'LogBy' => $uid,
        ];
        $logs = Logs::insert($loginput);
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $role, 'message'=> 'Success']);
        }else{
            return redirect()->back()->with('success', 'Record Updated!');
        }

        /*$validator = Validator::make($request->all(), 
            [ 
                'RoleName' => ['required', 'string', 'max:45', 'unique:tblroles'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'RoleName' => $request->RoleName,
        );
        //Role::where('RoleId', $RoleId)->update($request->all());
        Role::where('RoleId', $RoleId)->update($updatedata);
        $role = Role::where('RoleId', $RoleId)->findOrFail($RoleId);
        return response()->json(['success'=>'success', 'result' => $role], 200);*/
    }
    public function destroy(Request $request, $RoleId)
    {
        $role = Role::where('RoleId', $RoleId);
        $role->update(['Status' => 2]);

        $uid = Auth::id();
        $loginput = [
            'RecordId' => $RoleId,
            'TableId' => 2,
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
