<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Featureoperations;
use Validator;

class FeatureoperationsController extends Controller
{
    public function index()
    {
        $fea_ope = Featureoperations::get();
        return response()->json(['success'=>'success', 'result' => $fea_ope], 200);
    }
    /*public function show($FeatureId)
    {
        return Featureoperations::where('Status', 1)->find($FeatureId);
    }*/
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'FeatureId' => ['required', ],
                'OperationId' => ['required', ],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'FeatureId' => $request->FeatureId,
            'OperationId' => $request->OperationId,
        );
        $fea_ope = Featureoperations::create($inputdata);
        return response()->json(['success'=>'success', 'result' => $fea_ope], 201);
    }
    public function update(Request $request, $FeatureId, $OperationId)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'FeatureId' => ['required', ],
                'OperationId' => ['required', ],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'FeatureId' => $request->FeatureId,
            'OperationId' => $request->OperationId,
        );
        Featureoperations::where(['FeatureId'=> $FeatureId, 'OperationId'=> $OperationId])->update($updatedata);
        $fea_ope = Featureoperations::where($updatedata)->get();
        return response()->json(['success'=>'success', 'result' => $fea_ope], 200);
    }
    public function delete($FeatureId, $OperationId)
    {
        Featureoperations::where(['FeatureId'=> $FeatureId, 'OperationId'=> $OperationId])->delete();
        return response()->json(['success'=>'success', 'result' => 1], 200);
    }
}
