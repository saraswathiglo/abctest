<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::where('Status', 1)->get();
        return response()->json(['success'=>'success', 'result' => $roles], 200);
    }
    public function show($RoleId)
    {
        //return Role::where('RoleId', $RoleId)->firstOrFail();
        return Role::where('Status', 1)->find($RoleId);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'RoleName' => ['required', 'string', 'max:45', 'unique:tblroles'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'RoleName' => $request->RoleName,
        );
        $role = Role::create($inputdata);
        return response()->json(['success'=>'success', 'result' => $role], 201);
    }
    public function update(Request $request, $RoleId)
    {
        $validator = Validator::make($request->all(), 
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
        return response()->json(['success'=>'success', 'result' => $role], 200);
    }
    public function delete($RoleId)
    {
        $updatedata = array(
            'Status' => 2,
        );
        Role::where('RoleId', $RoleId)->update($updatedata);
        return response()->json(['success'=>'success', 'result' => 1], 200);
    }
}
