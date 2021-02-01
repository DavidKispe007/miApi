<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ubication;
use Illuminate\Http\Request;

class UbicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ubication::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:ubications'
        ]);

        Ubication::create($validated);

        return response()->json([
            'res' => true,
            'msn' => 'Registro creado correctamente'
        ], 200);
        
    }

    public function show(Ubication $ubication)
    {
        return $ubication;
    }

    public function update(Request $request, Ubication $ubication)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:ubications'
        ]);

        $ubication->update($validated);

        return response()->json([
            'res' => true,
            'msn' => 'Registro actualizado correctamente'
        ], 200);
    }

    public function destroy($id)
    {
        Ubication::destroy($id);

        return response()->json([
            'res' => true,
            'msn' => 'Registro eliminado correctamente'
        ], 200);
    }
}
