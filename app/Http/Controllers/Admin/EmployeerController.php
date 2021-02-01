<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProyeerRequest;
use App\Http\Requests\UpdateEmployeerRequest;
use App\Models\Employeer;
use Illuminate\Http\Request;

class EmployeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')) {
            $data = Employeer::where('name', 'like', '%' . $request->search . '%')
                            ->orWhere('last_name', 'like', '%' . $request->search . '%')
                            ->with('user', 'district')->get();
        } else {
            $data = Employeer::with('user', 'district')
                            ->orderBy('id', 'desc')                    
                            ->get();
    }

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProyeerRequest $request)
    {
        $input = $request->all();

        Employeer::create($input);

        return response()->json([
            'res' => true,
            'msn' => 'Usuario registrado correctamente'
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeerRequest $request, Employeer $employeer)
    {
        $input = $request->all();
        $employeer->update($input);

        return response()->json([
            'res' => true,
            'msn' => 'Usuario actualizado correctamente'
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
        Employeer::destroy($id);
        
        return response()->json([
            'res' => true,
            'msn' => 'Registro eliminado correctamente'
        ], 200);
    }
}
