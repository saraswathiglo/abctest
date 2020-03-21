<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use App\Locations;
use App\Orgbranches;
use App\Route;
use App\Routelocations;
use DB;

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
        return view('admin.countries');
    }
    public function addCountry()
    {
        return view('admin.addcountry');
    }
    public function State()
    {
        return view('admin.states');
    }
    public function addState()
    {
        return view('admin.addstate');
    }
    public function District()
    {
        return view('admin.districts');
    }
    public function addDistrict()
    {
        return view('admin.adddistrict');
    }
    public function Taluk()
    {
        return view('admin.talukas');
    }
    public function addTaluk()
    {
        return view('admin.addtaluk');
    }
    public function Panchayat()
    {
        return view('admin.addpanchayates');
    }
    public function addPanchayat()
    {
        return view('admin.addpanchayat');
    }
    public function Village()
    {
        return view('admin.villages');
    }
    public function addVillage()
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
        //$locations = Orgbranches::get();
        $locations = DB::table('tblbranchs as ob')
            ->join('tblorganizations as o', 'o.OrgId', '=', 'ob.OrgId')
            ->join('lookupentity as le', 'o.OrgTypeId', '=', 'le.EntityId')
            ->join('lookupgroups as lg', 'le.GroupId', '=', 'lg.GroupId')
            ->select('ob.*')->where('lg.GroupId','=',3) // 3 = waste generators
            ->get();
        $routes = Route::get();
        return view('admin.addroute', ['routes' => $routes, 'locations' => $locations]);
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

    public function routelocations(Request $request)
    {
        $locations = $request->locations;
        $RouteId = $request->route_name;
        //print_r($RouteId);dd();
        foreach($locations as $branchid)
        {
            $inputdata = array(
                'RouteId' => $RouteId,
                'BranchId' => $branchid['loc_id'],
                //'location_name' => $branchid['loc_name'],
            );
            DB::table('tblroutelocations')->insert($inputdata);
            //$route_location = Routelocations::create($inputdata);
            //$route_location->save();
        }
        return json_encode(['data'=>'true']);
    }

    public function driverroute()
    {
        $routes = Route::get();
        $drivers = DB::table('tblusers')->where('RoleId', 6)->where('Status',1)->get();
        $vehicles = DB::table('tblvehicles')->where('Status',1)->get();
        return view('admin.adddriverroute', ['routes' => $routes, 'drivers' => $drivers, 'vehicles' => $vehicles]);
    }
    public function createdriverroute(Request $request)
    {
        $inputdata = array(
            'UId' => $request->driver,
            'VehicleId' => $request->vehicle,
            'RouteId' => $request->route_name,            
            'AssignedDate' => Date('Y-m-d'),
            'AssignedTime' => Date('H:i:s'),
            'StartDate' => $request->start_date,
            'StartTime' => $request->start_time,
            'AssignedBy' => Auth::id(),
        );
        DB::table('tbldriverroutes')->insert($inputdata);
        return redirect('admin/driverroute');
    }
}
