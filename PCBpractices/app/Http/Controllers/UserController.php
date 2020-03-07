<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
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
        $data = array();
        $mainmenu = DB::table('tblrolefeatures as rf')
                ->join('tblfeatures as f', 'rf.FeatureId', '=', 'f.FeatureId')
                ->join('tbloperations as o', 'rf.OperationId', '=', 'o.OperationId')
                ->where('f.FeatureTypeId','=','MainMenu')
                ->select('rf.RoleId', 'rf.OperationId','f.FeatureName', 'f.FeatureTypeId', 'f.FeatureType', 'f.FeatureId', 'o.OperationName')
                ->get();
        //
        //DB::getQuerylog();
               // print_r($mainmenu);exit();
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
                
        }
        return $data;
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
        if (Auth::attempt(['EmailId' => $loginInfo['email'], 'Password' => $loginInfo['password']])) {

            if( Auth::user()->hasRole('Transporter')) {
                return view('transporter.home');
            }
            if( Auth::user()->hasRole('Waste_Generator')) {
                return view('wastegenerator.home');
            }
            if( Auth::user()->hasRole('Waste_Disposal_facility')) {
                return view('wastedisposalfacility.home');
            }
            if( Auth::user()->hasRole('Admin')) {
                //dd(888);
                return redirect('/admin/admin');
            }
        }
        else
        {
            return redirect('/login')->with('message','These credentials do not match our records.');
        }
    }


}
