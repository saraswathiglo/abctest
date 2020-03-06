<?php

namespace App\Http\Controllers;

//use DB;
use Illuminate\Http\Request;
use App\Tbltaluka;

class TalukaController extends Controller
{
    public function index()
    {
        //return DB::table('tbltaluka')->get();
        return Tbltaluka::all();
    }
    public function show($TalukaId)
    {
        //return DB::table('tbltaluka')->where('TalukaId', $TalukaId)->firstOrFail();
        return Tbltaluka::where('TalukaId', $TalukaId)->firstOrFail();
    }
    public function store(Request $request)
    {
    	/*$request->created_at = Date('Y-m-d H:i:s');
        $taluka = DB::table('tbltaluka')->insert($request->all());*/
        $taluka = Tbltaluka::create($request->all());
        return response()->json($taluka, 201);
    }
    public function update(Request $request, $TalukaId)
    {
        /*DB::table('tbltaluka')->where('TalukaId', $TalukaId)->update($request->all());
        $taluka = DB::table('tbltaluka')->where('TalukaId', $TalukaId)->get();*/
        Tbltaluka::where('TalukaId', $TalukaId)->update($request->all());
        $taluka = Tbltaluka::where('TalukaId', $TalukaId)->firstOrFail();
        return response()->json($taluka,200);
    }
    public function delete(Request $request, $TalukaId)
    {
        /*$taluka = DB::table('tbltaluka')->where('TalukaId', $TalukaId);
        $taluka->delete();*/
        $taluka = Tbltaluka::where('TalukaId', $TalukaId);
        $taluka->delete();
        return response()->json(204);
    }
}
