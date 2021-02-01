<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribuitor;
use Illuminate\Http\Request;

class DistribuitorController extends Controller
{
    
    public function index()
    {
        return Distribuitor::all();
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:distribuitors'
        ]);

        Distribuitor::create($validated);

        return response()->json([
            'res' => true,
            'msn' => 'Distribuidor creado'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function update(Request $request, Distribuitor $distribuitor)
    {
        $validated  = $request->validate([
            'name' => 'required|min:3|unique:categories'
        ]);

        $distribuitor->update($validated);

        return response()->json([
            'res' => true,
            'msn' => 'Categoría actualizada'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Distribuitor::destroy($id);

        return response()->json([
            'res' => true,
            'msn' => 'Registro eliminado'
        ], 200);
    }
}
