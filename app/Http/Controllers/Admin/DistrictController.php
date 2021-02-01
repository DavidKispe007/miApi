<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    
    public function index()
    {
        return District::all();
    }

 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:districts'
        ]);

        District::create($validated);

        return response()->json([
            'res' => true,
            'msn' => 'Distrito creado'
        ], 200);
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, District $district)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:districts'
        ]);

        $district->update($validated);

        return response()->json([
            'res' => true,
            'msn' => 'Distrito actualizado'
        ], 200);
    }

    public function destroy($id)
    {
        District::destroy($id);

        return response()->json([
            'res' => true,
            'msn' => 'Distrito eliminado'
        ], 200);
    }
}
