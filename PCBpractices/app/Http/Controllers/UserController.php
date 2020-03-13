<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Logs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use DB;

class UserController extends Controller
{

    public function index()
    {
        return $user = Auth::user();
        return User::all();
    }
    public function show($uid)
    {
        return User::find($uid);
    }
    public function store(Request $request)
    {
        /*$inputdata = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        );
        //$user = User::create($request->all());
        $user = User::create($inputdata);
        return response()->json($user, 201);*/
        $validator = Validator::make($request->all(), 
            [ 
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(150).base64_encode($request->email),
        );
        $user = User::create($inputdata);
        return response()->json(['success'=>'success', 'user' => $user], 201);
    }
    public function update(Request $request)
    {
        if (Auth::user()){
            $uid = Auth::id();
            $validator = Validator::make($request->all(), 
                [ 
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', ],
                    //'unique:users',Rule::unique('users')->ignore($uid, 'id')
                    //'password' => ['required', 'string', 'min:8'],
                ]
            );
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
            }
            $updatedata = array(
                'name' => $request->name,
                'email' => $request->email,
                //'password' => Hash::make($request->password),
                //'api_token' => Str::random(150),
            );
            $user = User::where('id', $uid)->update($updatedata);
            $userdata = User::findOrFail($uid);
            return response()->json(['success'=>'success', 'user' => $userdata], 201);
        }
        /*$user = User::findOrFail($uid);
        $updatedata = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        );
        //$user->update($request->all());
        User::where('id', $uid)->update($updatedata);
        $userdata = User::findOrFail($uid);
        return response()->json($userdata, 200);*/
    }

    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'email' => ['required', 'string', 'email',],
                'password' => ['required', 'string',],
            ]
        );
        $email = $request->email;
        $password = $request->password;
        if ($validator->fails()) {
            //return response()->json(['error'=>$validator->errors(), 'result' => [], 'message'=> 'Validation Error']);
            return response()->json(['status'=>'failed', 'result' => [], 'message'=> 'Validation Error']);
        }
        if (Auth::attempt(['EmailId' => $email, 'password' => $password]))
        {
            $uid = Auth::id();
            $updatetoken = array(
                'ApiToken' => Str::random(150).Date('Y-m-dH:i:s'),
            );
            $user = User::where('UId', $uid)->update($updatetoken);
            $userdata = User::findOrFail($uid);
            $loginput = [
                'RecordId' => $uid,
                'TableId' => 1,
                'TypeId' => 1,
                'Dated' => Date('Y-m-d H:i:s'),
                'LogBy' => $uid,
            ];
            $logs = Logs::insert($loginput);
            //return response()->json(['success'=>'success', 'result' => $userdata], 200);
            $result = array();
            $RoleId = $userdata->RoleId;
            $result['ApiToken'] = $userdata->ApiToken;
            $result['uid'] = $uid;
            $result['DisplayName'] = $userdata->DisplayName;
            $mainmenu = DB::table('tblrolefeatures as rf')
                ->join('tblfeatures as f', 'rf.FeatureId', '=', 'f.FeatureId')
                ->join('tbloperations as o', 'rf.OperationId', '=', 'o.OperationId')
                ->join('tblroles as r', 'rf.RoleId', '=', 'r.RoleId')
                ->where('f.FeatureType','=','MainMenu')
                ->where('rf.RoleId','=',$RoleId)
                ->select('f.FeatureName', 'f.FeatureId', 'r.RoleName', 'f.MenuOrder')
                ->get();
            $i = 0;$submenuarray = [];
            
            foreach($mainmenu as $row){
                $result['RoleName'] = $row->RoleName;
                //DB::enableQuerylog();
                $submenu = DB::table('tblrolefeatures as rf')
                    ->join('tblfeatures as f', 'rf.FeatureId', '=', 'f.FeatureId')
                    ->where('f.FeatureType','=','SubMenu')
                    ->where('f.FeatureTypeId','=', $row->FeatureId)
                    ->where('rf.RoleId','=',$RoleId)
                    ->select('rf.FeatureId', 'f.FeatureName', 'f.MenuOrder')
                    ->groupby('rf.FeatureId' , 'f.FeatureName', 'f.MenuOrder')
                    ->get();
                    $sub_menu2 = array();
                foreach($submenu as $row2){
                    $permissions = DB::table('tblrolefeatures as rf')
                                ->join('tbloperations as o', 'rf.OperationId', '=', 'o.OperationId')
                                ->where('rf.RoleId','=',$RoleId)
                                ->where('rf.FeatureId','=', $row2->FeatureId)
                                ->select('rf.OperationId' , 'o.OperationName')
                                ->get();
                    $sub_menu2[] = array('FeatureId' => $row2->FeatureId ,
                              'FeatureName' => $row2->FeatureName ,
                              'SubMenuOrder' => $row2->MenuOrder ,
                              'permissions' => $permissions );
                }    
                //print_r(DB::getQuerylog());
                $menu = array('FeatureId' => $row->FeatureId ,
                              'FeatureName' => $row->FeatureName ,
                              'MenuOrder' => $row->MenuOrder ,
                              'sub_menu' => $sub_menu2 );    

                $result['menulist'][] = $menu; 
                // $data['RoleName'] = $row->RoleName;
                // ///*$data[$row->FeatureType][$i][$row->FeatureId] = $row->FeatureName;*/
                // //$data[$row->FeatureType][$row->FeatureId][$row->FeatureId] = $row->FeatureName;

                // $data[$row->FeatureType][$i]["FeatureId"] = $row->FeatureId;
                // $data[$row->FeatureType][$i]["FeatureName"] = $row->FeatureName;
                // //$data[$row->FeatureType][$i]["FeatureType"] = $row->FeatureType;
                // $submenu = DB::table('tblrolefeatures as rf')
                //     ->join('tblfeatures as f', 'rf.FeatureId', '=', 'f.FeatureId')
                //     ->join('tbloperations as o', 'rf.OperationId', '=', 'o.OperationId')
                //     ->where('f.FeatureType','=','SubMenu')->where('f.FeatureTypeId','=',$row->FeatureId)->where('rf.RoleId','=',$RoleId)
                //     //->select('rf.*', 'f.FeatureName', 'f.FeatureType', 'f.FeatureTypeId', 'o.OperationName')
                //     ->select('f.FeatureId', 'f.FeatureName')
                //     ->get();
                // $j = 0;

                
                // foreach ($submenu as $subrow) {
                //     ///*$data[$row->FeatureType][$i][$subrow->FeatureType][$subrow->FeatureId] = $subrow->FeatureName;*/
                //     ///*$data[$row->FeatureType][$i][$subrow->FeatureType][$subrow->FeatureName][$subrow->OperationName] = 'true'; // after submenu operations shown*/
                    

                //     $submenuarray [$subrow->FeatureId] = ['FeatureId' => $subrow->FeatureId , 
                //                         'FeatureName' => $subrow->FeatureName];

                //     //$data[$row->FeatureType][$i][$subrow->FeatureType][$i] = $subrow->FeatureId;
                //     //$data[$row->FeatureType][$i][$subrow->FeatureType] = $subrow->FeatureName;
                //     //$data[$row->FeatureType][$i][$subrow->FeatureType][$subrow->FeatureId][$subrow->FeatureName][$subrow->OperationName] = 'true';

                //     /*///*$data[$row->FeatureType][$i][$subrow->FeatureType][$subrow->FeatureId]['FeatureId'] = $subrow->FeatureId;
                //     $data[$row->FeatureType][$i][$subrow->FeatureType][$subrow->FeatureId]['FeatureName'] = $subrow->FeatureName;
                //     $data[$row->FeatureType][$i][$subrow->FeatureType][$subrow->FeatureId][$subrow->FeatureName][$subrow->OperationName] = 'true';*/


                //     //$data[$row->FeatureType][$row->FeatureId][$subrow->FeatureType][$subrow->FeatureId] = $subrow->FeatureName;
                //         /*$operations = DB::table('tbloperations as o')
                //             ->where('o.OperationId','=',$subrow->OperationId)
                //             ->select('o.OperationName')
                //             ->get();
                //             foreach($operations as $rowop){
                //                 $data[$row->FeatureType][$i][$subrow->FeatureType][$subrow->FeatureName][$rowop->OperationName] = 'true';

                //             }*/

                //     $j++;
                // }
                // //$data['submenu'] = $submenu;
                // $i++;   

            }
            //dd($submenuarray);
            
            return response()->json(['status'=>'success', 'result' => $result, 'message' => 'Success']);
        }
        return response()->json(['status'=>'failed', 'result' => [], 'message' => 'Invalid Credentials']);



        /*$validator = Validator::make($request->all(), 
            [
                'email' => ['required', 'string', 'email',],
                'password' => ['required', 'string',],
            ]
        );
        $email = $request->email;
        $password = $request->password;
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $uid = Auth::id();
            $updatetoken = array(
                'api_token' => Str::random(150).base64_encode($email),
            );
            $user = User::where('id', $uid)->update($updatetoken);
            $userdata = User::findOrFail($uid);
            return response()->json(['success'=>'success', 'user' => $userdata], 200);
        }else{
            return response()->json(['error'=>'Wrong Login Details'], 401);
        }*/
        //return response()->json(204);
        /*$RoleId = 2;
        $uId = 1;
        $data = [];
        $data['screen'] = 'Menu';
        $menu = DB::table('tblrolefeatures')->get();*/
        //DB::enableQuerylog();  
        /*$data = array();
        $mainmenu = DB::table('tblrolefeatures as rf')
                ->join('tblfeatures as f', 'rf.FeatureId', '=', 'f.FeatureId')
                ->join('tbloperations as o', 'rf.OperationId', '=', 'o.OperationId')
                ->where('f.FeatureTypeId','=','MainMenu')
                ->select('rf.RoleId', 'rf.OperationId','f.FeatureName', 'f.FeatureTypeId', 'f.FeatureType', 'f.FeatureId', 'o.OperationName')
                ->get();
        
        foreach($mainmenu as $row){
            $data[$row->FeatureTypeId] = $row->FeatureName;
            $submenu = DB::table('tblfeatures as f')
                ->where('f.FeatureTypeId','=','SubMenu')
                ->where('f.FeatureType','=',$row->FeatureId)
                ->select('f.FeatureName', 'f.FeatureTypeId', 'f.FeatureType')
                ->get();
                //print_r($submenu);exit();
                $i = 0;
                foreach ($submenu as $subrow) {
                    $data[$i][$subrow->FeatureTypeId] = $subrow->FeatureName;
                    
                    $operations = DB::table('tbloperations as o')
                        ->where('o.OperationId','=',$row->OperationId)
                        ->select('o.OperationName')
                        ->get();
                        $j = 0;
                        foreach($operations as $rowop){
                            //$data[$i][$subrow->FeatureTypeId][$rowop->OperationName] = true;;
                            $j++;
                        }
                    $i++; 
                }
                
        }*/
    }

    public function delete(Request $request, $uid)
    {
        $user = User::findOrFail($uid);
        $user->delete();
        return response()->json(204);
    }

    public function login(Request $request)
    {
        $loginInfo=$request->all();
        if (Auth::attempt(['EmailId' => $loginInfo['email'], 'password' => $loginInfo['password']])) {
            if( Auth::user()->hasRole('Admin')) {
                return redirect('/admin/admin');
            }
            if( Auth::user()->hasRole('Transporter')) {
                return view('transporter.home');
            }
            if( Auth::user()->hasRole('Waste_Generator')) {
                return view('wastegenerator.home');
            }
            if( Auth::user()->hasRole('Waste_Disposal_facility')) {
                return view('wastedisposalfacility.home');
            }
            
            if( Auth::user()->hasRole('Guest')) {
                dd('Guest');
            }else{
                dd('jfgh');
            }
        }
        else
        {
            return redirect('/login')->with('message','These credentials do not match our records.');
        }
    }

    public function transporterassignment()
    {
        if(Auth::id()){
            $uid = Auth::id();



            DB::enableQuerylog();
            $assignroute = DB::table('tbldriverroutes as dr')
                ->join('tblusers as u','dr.UId','=','u.UId')
                ->join('tblvehicles as v','dr.VehicleId','=','v.VehicleId')
                ->join('tblroutelocations as rl','dr.RouteId','=','rl.RouteId')
                ->join('tblbranchs as b','rl.BranchId','=','b.BranchId')            
                ->where('dr.Status','=',1)->where('v.Status','=',1)
                ->where('b.Status','=',1)->where('u.Status','=',1)
                ->where('dr.UId','=',$uid)
                ->select('u.DisplayName','v.VehicleName', 'v.VehicleNumber','b.BranchName','b.Latitude','b.Longitude','b.Location', 'dr.StartDate', 'dr.StartTime')->get();
                //return print_r(DB::getQuerylog());
            $locations = []; $result = []; $i = 0;
            foreach ($assignroute as $row) {
                $locations[$i]['BranchName'] = $row->BranchName;
                $locations[$i]['Latitude'] = $row->Latitude;
                $locations[$i]['Longitude'] = $row->Longitude;
                $locations[$i]['Location'] = $row->Location;

                $result = array( 'DisplayName' => $row->DisplayName,
                    'VehicleName' => $row->VehicleName,
                    'VehicleNumber' => $row->VehicleNumber,
                    'StartDate' => $row->StartDate,
                    'StartTime' => $row->StartTime,
                    'locations' => $locations,
                );
                $i++;
            }
            return response()->json(['status'=>'success', 'result' => $result, 'message' => 'Success']);
        }
        return response()->json(['status'=>'failed', 'result' => $result, 'message' => 'Invalid Credentials']);
    }

}
