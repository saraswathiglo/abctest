<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        return Organization::all();
    }
    public function show($OrgId)
    {
        return Organization::where('OrgId', $OrgId)->firstOrFail();
    }
    public function store(Request $request)
    {
        //$orgdata = Organization::create($request->all());
        //return response()->json(['success'=>'success', 'orgdata' => $orgdata], 201);
    }
    public function update(Request $request, $OrgId)
    {
        Organization::where('OrgId', $OrgId)->update($request->all());
        $orgdata = Organization::where('OrgId', $OrgId)->firstOrFail();
        return response()->json($orgdata,200);
    }
    public function delete(Request $request, $OrgId)
    {
        $orgdata = Organization::where('OrgId', $OrgId);
        $orgdata->delete();
        return response()->json(204);
    }
}
