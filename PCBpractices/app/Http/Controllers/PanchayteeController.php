<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tblpanchaytee;

class PanchayteeController extends Controller
{
    public function index()
    {
        return Tblpanchaytee::all();
    }
    public function show($PanchayteeId)
    {
        return Tblpanchaytee::where('PanchayteeId', $PanchayteeId)->firstOrFail();
    }
    public function store(Request $request)
    {
        $panchaytee = Tblpanchaytee::create($request->all());
        return response()->json($panchaytee, 201);
    }
    public function update(Request $request, $PanchayteeId)
    {
        Tblpanchaytee::where('PanchayteeId', $PanchayteeId)->update($request->all());
        $panchaytee = Tblpanchaytee::where('PanchayteeId', $PanchayteeId)->firstOrFail();
        return response()->json($panchaytee,200);
    }
    public function delete(Request $request, $PanchayteeId)
    {
        $panchaytee = Tblpanchaytee::where('PanchayteeId', $PanchayteeId);
        $panchaytee->delete();
        return response()->json(204);
    }
}
