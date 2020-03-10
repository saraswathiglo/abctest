<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rolefeatures;
use Validator;
use DB;

class RolefeaturesController extends Controller
{
    public function index()
    {
        $role_fea = Rolefeatures::get();
        return response()->json(['success'=>'success', 'result' => $role_fea], 200);
    }
    /*public function show()
    {
        //return Rolefeatures::where('Status', 1)->find($RoleId);
    }*/
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'RoleId' => ['required',],
                'FeatureId' => ['required',],
                'OperationId' => ['required',],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'RoleId' => $request->RoleId,
            'FeatureId' => $request->FeatureId,
            'OperationId' =>$request->OperationId,
        );
        $role_fea = Rolefeatures::firstOrNew($inputdata);
        $role_fea->save();
        return response()->json(['success'=>'success', 'result' => $role_fea], 201);
    }
    public function update(Request $request, $RoleId, $FeatureId, $OperationId)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'RoleId' => ['required',],
                'FeatureId' => ['required',],
                'OperationId' => ['required',],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'RoleId' => $request->RoleId,
            'FeatureId' => $request->FeatureId,
            'OperationId' =>$request->OperationId,
        );
        $role_fea = Rolefeatures::where($updatedata)->first();
        $rolefeature = Rolefeatures::where(['FeatureId' => $request->FeatureId,
            'OperationId' =>$request->OperationId])->first();
        if(!$role_fea && $rolefeature){
            Rolefeatures::where(['RoleId' => $RoleId, 'FeatureId' => $FeatureId, 'OperationId' => $OperationId])->update($updatedata);
        }
        return response()->json(['success'=>'success', 'result' => $role_fea], 200);
    }
    public function delete($RoleId, $FeatureId, $OperationId)
    {
        Rolefeatures::where(['RoleId' => $RoleId, 'FeatureId' => $FeatureId, 'OperationId' => $OperationId])->delete();
        return response()->json(['success'=>'success', 'result' => 1], 200);
    }
}
