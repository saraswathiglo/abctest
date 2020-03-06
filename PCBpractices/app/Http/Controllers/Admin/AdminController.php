<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    public function index()
    {
        return redirect('/admin/dashboard');
    }
    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function WasteGenerator()
    {

        return view('admin.dashboard');
    }
    public function WasteDisposalFacilities()
    {

        return view('admin.dashboard');
    }
    public function VehicleType()
    {

        return view('admin.dashboard');
    }
    public function Employees()
    {

        return view('admin.dashboard');
    }
    public function Roles()
    {

        return view('admin.dashboard');
    }
    public function IndustryTypes()
    {

        return view('admin.dashboard');
    }
    public function WasteColors()
    {

        return view('admin.dashboard');
    }
    public function WasteTypes()
    {

        return view('admin.dashboard');
    }
    public function Country()
    {

        return view('admin.dashboard');
    }
    public function State()
    {

        return view('admin.dashboard');
    }
    public function District()
    {

        return view('admin.dashboard');
    }
    public function Taluk()
    {

        return view('admin.dashboard');
    }
    public function Panchayat()
    {

        return view('admin.dashboard');
    }
    public function Village()
    {

        return view('admin.dashboard');
    }
}
