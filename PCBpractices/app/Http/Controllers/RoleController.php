<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }
    public function show($RoleId)
    {
        //return Role::where('RoleId', $RoleId)->firstOrFail();
        return Role::find($RoleId);
    }
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        return response()->json($role, 201);
    }
    public function update(Request $request, $RoleId)
    {
        //Role::where('RoleId', $RoleId)->update($request->all());
        //$role = Role::where('RoleId', $RoleId)->firstOrFail();
        Role::where('id', $RoleId)->update($request->all());
        $role = Role::find($RoleId);
        return response()->json($role,200);
    }
    public function delete(Request $request, $RoleId)
    {
        //$role = Role::where('RoleId', $RoleId);
    	$role = Role::where('id', $RoleId);
        $role->delete();
        return response()->json(204);
    }
}
