<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operations;
use Validator;

class OperationsController extends Controller
{
    public function index()
    {
        $operations = Operations::where('Status', 1)->get();
        return response()->json(['success'=>'success', 'result' => $operations], 200);
    }
    public function show($OperationId)
    {
        $operation =  Operations::where('Status', 1)->find($OperationId);
        return response()->json(['success'=>'success', 'result' => $operation], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'OperationName' => ['required', 'string', 'max:45', 'unique:tbloperations'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'OperationName' => $request->OperationName,
        );
        $operation = Operations::create($inputdata);
        return response()->json(['success'=>'success', 'result' => $operation], 201);
    }
    public function update(Request $request, $OperationId)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'OperationName' => ['required', 'string', 'max:45', 'unique:tbloperations'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'OperationName' => $request->OperationName,
        );
        Operations::where('OperationId', $OperationId)->update($updatedata);
        $operation = Operations::where('OperationId', $OperationId)->findOrFail($OperationId);
        return response()->json(['success'=>'success', 'result' => $operation], 200);
    }
    public function delete($OperationId)
    {
        $updatedata = array(
            'Status' => 2,
        );
        Operations::where('OperationId', $OperationId)->update($updatedata);
        return response()->json(['success'=>'success', 'result' => 1], 200);
    }
}
