<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Features;
use Validator;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = Features::where('Status', 1)->get();
        return response()->json(['success'=>'success', 'result' => $features], 200);
    }
    public function show($FeatureId)
    {
        $feature = Features::where('Status', 1)->find($FeatureId);
        return response()->json(['success'=>'success', 'result' => $feature], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'FeatureName' => ['required', 'string', 'max:45', 'unique:tblfeatures'],
                'FeatureId' => ['required', ],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'FeatureName' => $request->FeatureName,
            'FeatureId' => $request->FeatureId,
        );
        $feature = Features::create($inputdata);
        return response()->json(['success'=>'success', 'result' => $feature], 201);
    }
    public function update(Request $request, $FeatureId)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'FeatureName' => ['required', 'string', 'max:45', 'unique:tblfeatures'],
                'FeatureId' => ['required', ],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'FeatureName' => $request->FeatureName,
            'FeatureId' => $request->FeatureId,
        );
        Features::where('FeatureId', $FeatureId)->update($updatedata);
        $feature = Features::where('FeatureId', $FeatureId)->findOrFail($FeatureId);
        return response()->json(['success'=>'success', 'result' => $feature], 200);
    }
    public function delete($FeatureId)
    {
        $updatedata = array(
            'Status' => 2,
        );
        Features::where('FeatureId', $FeatureId)->update($updatedata);
        return response()->json(['success'=>'success', 'result' => 1], 200);
    }
}
