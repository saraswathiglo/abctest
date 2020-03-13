<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbldistrict;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Transporter');
    }

    public function index()
    {
        return Tbldistrict::all();
    }
    public function show($DistrictId)
    {
        return Tbldistrict::where('DistrictId', $DistrictId)->firstOrFail();
    }
    public function store(Request $request)
    {
        $district = Tbldistrict::create($request->all());
        return response()->json($district, 201);
    }
    public function update(Request $request, $DistrictId)
    {
        Tbldistrict::where('DistrictId', $DistrictId)->update($request->all());
        $district = Tbldistrict::where('DistrictId', $DistrictId)->firstOrFail();
        return response()->json($district,200);
    }
    public function delete(Request $request, $DistrictId)
    {
        $district = Tbldistrict::where('DistrictId', $DistrictId);
        $district->delete();
        return response()->json(204);
    }
}
