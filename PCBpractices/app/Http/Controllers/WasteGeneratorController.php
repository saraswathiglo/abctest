<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WasteGeneratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Waste_Generator');
    }
    public function index()
    {
        return view('wastegenerator.home');
    }
}
