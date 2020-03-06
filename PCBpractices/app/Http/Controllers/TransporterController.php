<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransporterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Transporter');
    }
    public function index()
    {
        return view('transporter.home');
    }
}
