<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WasteDisposalFacilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Waste_Disposal_Facility');
    }
    public function index()
    {
        return view('wastedisposalfacility.home');
    }
}
