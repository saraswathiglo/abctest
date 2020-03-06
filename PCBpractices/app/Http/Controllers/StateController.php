<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tblstate;

class StateController extends Controller
{
    public function index()
    {
        return Tblstate::all();
    }
    public function show($StateId)
    {
        return Tblstate::where('StateId', $StateId)->firstOrFail();
    }
    public function store(Request $request)
    {
        $states = Tblstate::create($request->all());
        return response()->json($states, 201);
    }
    public function update(Request $request, $StateId)
    {
        //$state = Tblstate::findOrFail($StateId);
        //$state->update($request->all());
        Tblstate::where('StateId', $StateId)->update($request->all());
        $state = Tblstate::where('StateId', $StateId)->firstOrFail();
        return response()->json($state,200);
    }
    public function delete(Request $request, $StateId)
    {
        //$state = Tblstate::findOrFail($StateId);
        $state = Tblstate::where('StateId', $StateId);
        $state->delete();
        return response()->json(204);
    }
}
