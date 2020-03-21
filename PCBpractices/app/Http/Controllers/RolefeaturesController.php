<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rolefeatures;
use App\Logs;
use Validator;
use Auth;

use App\Role;
use App\Features;
use App\Operations;
use DB;

class RolefeaturesController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions:districts,view', ['only' => ['index','show']]);
        $this->middleware('permissions:districts,create', ['only' => ['store']]);
        $this->middleware('permissions:districts,update', ['only' => ['edit','update']]);
        $this->middleware('permissions:districts,delete', ['only' => ['destroy']]);
    }*/

    public function index(Request $request)
    {
        //$role_fea = Rolefeatures::get();
        //return response()->json(['success'=>'success', 'result' => $role_fea], 200);
        $roles = Role::where('Status',1)->get();
        if($request->ajax()){
            return response()->json(['status'=>'success', 'result' => $roles, 'message'=> 'Success']);
        }else{
            return view('rolefeatures.index', compact('roles'));
        }

    }
    /*public function show()
    {
        //return Rolefeatures::where('Status', 1)->find($RoleId);
    }*/
    public function create(Request $request)
    {
        if($request->ajax()){
        }else{
            $roles = Role::where('Status',1)->get();
            $features = Features::where('Status',1)->where('FeatureType','MainMenu')->get();
            $operations = Operations::where('Status',1)->get();
            $role_features = Rolefeatures::all();
            return view('rolefeatures.create', compact('roles','features', 'operations'));
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [ 
                'RoleId' => ['required',],
                'FeatureId' => ['required',],
                'OperationId' => ['required',],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $inputdata = array(
            'RoleId' => $request->RoleId,
            'FeatureId' => $request->FeatureId,
            'OperationId' =>$request->OperationId,
        );
        $role_fea = Rolefeatures::firstOrNew($inputdata);
        $role_fea->save();
        return response()->json(['success'=>'success', 'result' => $role_fea], 201);
    }
    public function edit(Request $request, $RoleId)
    {
        if($request->ajax()){
        }else{
            $roles = Role::where('RoleId',$RoleId)->where('Status',1)->get();
            $features = Features::where('Status',1)->where('FeatureType','MainMenu')->get();
            $operations = Operations::where('Status',1)->get();
            //$role_features = Rolefeatures::where('RoleId',$RoleId)->get();
            $role_features = Rolefeatures::select(DB::raw("CONCAT(RoleId,'_',FeatureId,'_',OperationId) AS rolefeature"))->get()->map(function ($item, $key) {
                return $item['rolefeature'];
            })->toArray();
            $RoleId = $RoleId;
            return view('rolefeatures.edit', compact('roles','features', 'operations', 'RoleId', 'role_features'));
        }
    }
    public function update(Request $request, $RoleId)
    {
        if($request->ajax()){
        }else{
            if(is_array($request->OperationId)){
                DB::beginTransaction();
                try {
                    Rolefeatures::where('RoleId', $RoleId)->delete();
                    foreach($request->OperationId as $row)
                    {
                        $RoleId_FeatureId_OperationId = explode('_', $row);
                        $inputdata = array(
                            'RoleId' => $RoleId_FeatureId_OperationId[0],
                            'FeatureId' => $RoleId_FeatureId_OperationId[1],
                            'OperationId' => $RoleId_FeatureId_OperationId[2],
                        );
                        $role_fea = Rolefeatures::firstOrNew($inputdata);
                        $role_fea->save();
                    }
                    DB::commit();
                    return redirect()->back()->with('success', 'Records Updated!');
                } catch (Exception $e) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Something Missed! Try Again');
                }
                return redirect()->back()->with('success', 'Records Updated!');
            }
            return redirect()->back()->with('error', 'Something Missed! Try Again');
        }

           

        /*$validator = Validator::make($request->all(), 
            [ 
                'RoleId' => ['required',],
                'FeatureId' => ['required',],
                'OperationId' => ['required',],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $updatedata = array(
            'RoleId' => $request->RoleId,
            'FeatureId' => $request->FeatureId,
            'OperationId' =>$request->OperationId,
        );
        $role_fea = Rolefeatures::where($updatedata)->first();
        $rolefeature = Rolefeatures::where(['FeatureId' => $request->FeatureId,
            'OperationId' =>$request->OperationId])->first();
        if(!$role_fea && $rolefeature){
            Rolefeatures::where(['RoleId' => $RoleId, 'FeatureId' => $FeatureId, 'OperationId' => $OperationId])->update($updatedata);
        }
        return response()->json(['success'=>'success', 'result' => $role_fea], 200);*/
    }
    public function delete($RoleId, $FeatureId, $OperationId)
    {
        Rolefeatures::where(['RoleId' => $RoleId, 'FeatureId' => $FeatureId, 'OperationId' => $OperationId])->delete();
        return response()->json(['success'=>'success', 'result' => 1], 200);
    }
}
