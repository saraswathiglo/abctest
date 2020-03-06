<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use Validator;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::all();
        return response()->json(['success'=>'success', 'address' => $address], 200);
    }
    public function show($AddressId)
    {
        $address = Address::where('AddressId', $AddressId)->firstOrFail();
        return response()->json(['success'=>'success', 'address' => $address], 200);
    }
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), 
            [ 
                'UId' => ['required', 'numeric'],
                'ConcatNo' => ['required','numeric',],
                //'AlternateContactNo' => ['bail', 'required', 'numeric',],
                'EmailId' => ['required', 'string', 'email', 'max:255', ],
                'Address' => ['required', 'max:255', ],
                'VillageId' => ['required', 'numeric'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'UId' => $request->UId,
            'ConcatNo' => $request->ConcatNo,
            'EmailId' => $request->EmailId,
            'Address' => $request->Address,
            'VillageId' => $request->VillageId,
            'AlternateContactNo' => $request->AlternateContactNo,
            'Lattitude' => $request->Lattitude,
            'Longitude' => $request->Longitude,
        );
        $address = Address::create($inputdata);
        //Address::create($request->all());
        return response()->json(['success'=>'success', 'address' => $address], 201);
    }
    public function update(Request $request, $AddressId)
    {
    	$validator = Validator::make($request->all(), 
            [ 
                'UId' => ['required', 'numeric'],
                'ConcatNo' => ['required','numeric', 'min:10','max:10'],
                'EmailId' => ['required', 'string', 'email', 'max:255', ],
                'Address' => ['required', 'max:255', ],
                'VillageId' => ['required'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'UId' => $request->UId,
            'ConcatNo' => $request->ConcatNo,
            'EmailId' => $request->EmailId,
            'Address' => $request->Address,
            'VillageId' => $request->VillageId,
            'AlternateContactNo' => $request->AlternateContactNo,
            'Lattitude' => $request->Lattitude,
            'Longitude' => $request->Longitude,
        );
        Address::where('AddressId', $AddressId)->update($updatedata);
        $address = Address::where('AddressId', $AddressId)->firstOrFail();
        return response()->json(['success'=>'success', 'address' => $address], 200);
    }
    public function delete(Request $request, $AddressId)
    {
        $address = Address::where('AddressId', $AddressId);
        $address->delete();
        return response()->json(['success'=>'success'], 204);
    }
}
