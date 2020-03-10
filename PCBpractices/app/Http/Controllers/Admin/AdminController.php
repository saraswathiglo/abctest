<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Locations;

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

        return view('admin.industries');
    }
    public function WasteDisposalFacilities()
    {

        return view('admin.recycleplants');
    }
    public function VehicleType()
    {

        return view('admin.vehicletypes');
    }
    public function Employees()
    {

        return view('admin.employee');
    }
    public function Roles()
    {

        return view('admin.roles');
    }
    public function vehicletypes()
    {

        return view('admin.vehicletypes');
    }
    public function IndustryTypes()
    {

        return view('admin.industrytypes');
    }
    public function WasteColors()
    {

        return view('admin.wastecolors');
    }
    public function WasteTypes()
    {

        return view('admin.wastetypes');
    }
    public function Country()
    {

        return view('admin.addcountry');
    }
    public function State()
    {

        return view('admin.addstate');
    }
    public function District()
    {

        return view('admin.adddistrict');
    }
    public function Taluk()
    {

        return view('admin.addtaluk');
    }
    public function Panchayat()
    {

        return view('admin.addpanchayat');
    }
    public function Village()
    {

        return view('admin.addvillage');
    }
    public function addroles()
    {

        return view('admin.addrole');
    }
    public function addvehicletype()
    {

        return view('admin.addvehicletype');
    }
    public function addemployee()
    {
        return view('admin.addemployee');
    }

    public function addindustrytype()
    {
        return view('admin.addindustrytype');
    }
    public function addindustry()
    {
        return view('admin.addindustry');
    }
    public function addindustrybranch()
    {
        return view('admin.addindustrybranch');
    }
    public function addwastetype()
    {
        return view('admin.addwastetype');
    }
    public function addwastecolor()
    {
        return view('admin.addwastecolor');
    }
    public function addrecycleplant()
    {
        return view('admin.addrecycleplant');
    }
    public function addrecycleplantbranch()
    {
        return view('admin.addrecycleplantbranch');
    }
    public function adduser()
    {
        return view('admin.adduser');
    }
    public function routemanagement()
    {
        return view('admin.routemanagement');
    }
    public function addroute()
    {
        $locations = Locations::get();
        return view('admin.addroute', ['locations' => $locations]);
    }


   /* public function industrytypes()
    {
        return view('admin.industrytypes');
    }*/
    public function industries()
    {
        return view('admin.industries');
    }
    public function industrybranches()
    {
        return view('admin.industrybranches');
    }
    /*public function wastetypes()
    {
        return view('admin.wastetypes');
    }
    public function wastecolors()
    {
        return view('admin.wastecolors');
    }*/
    public function recycleplants()
    {
        return view('admin.recycleplants');
    }
    public function recycleplantbranches()
    {
        return view('admin.recycleplantbranches');
    }
    public function userslist()
    {
        return view('admin.userslist');
    }
    public function settings()
    {

        return view('admin.settings');
    }

    public function add_route(Request $request)
    {
        print_r($request);dd();
    }
}
