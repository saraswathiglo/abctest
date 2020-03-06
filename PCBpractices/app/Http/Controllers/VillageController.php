<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Village;
use Validator;

class VillageController extends Controller
{
    public function index()
    {
        $villages = Village::all();
        return response()->json(['success'=>'success', 'village' => $villages], 200);
    }
    public function show($VillageId)
    {
        $village = Village::where('VillageId', $VillageId)->firstOrFail();
        return response()->json(['success'=>'success', 'village' => $village], 200);
    }
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), 
            [ 
                'VillageName' => ['required', 'max:255'],
                'PanchayteeId' => ['required'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'VillageName' => $request->VillageName,
            'PanchayteeId' => $request->PanchayteeId,
        );
        $village = Village::create($inputdata);
        return response()->json(['success'=>'success', 'village' => $village], 201);
    }
    public function update(Request $request, $VillageId)
    {
    	$validator = Validator::make($request->all(), 
            [ 
                'VillageName' => ['required', 'max:255'],
                'PanchayteeId' => ['required'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'VillageName' => $request->VillageName,
            'PanchayteeId' => $request->PanchayteeId,
        );
        Village::where('VillageId', $VillageId)->update($updatedata);
        $village = Village::where('VillageId', $VillageId)->firstOrFail();
        return response()->json(['success'=>'success', 'village' => $village], 200);
    }
    public function delete(Request $request, $VillageId)
    {
        $village = Village::where('VillageId', $VillageId);
        $village->delete();
        return response()->json(['success'=>'success'], 204);
    }
}
