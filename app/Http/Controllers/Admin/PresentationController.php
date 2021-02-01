<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Models\Presentation;

use Illuminate\Http\Request;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')) 
        {
            $presentations = Presentation::where('name', 'like', '%' . $request->search . '%')->get();
        } else 
        {
            $presentations = Presentation::all();
        }

        return $presentations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePresentationRequest $request)
    {
        $input = $request->all();
        Presentation::create($input);

        return response()->json([
            'res' => true,
            'msn' => 'Presentación creada correctamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentation)
    {
        return $presentation;
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(UpdatePresentationRequest $request, Presentation $presentation)
    {
        $input = $request->all();
        $presentation->update($input);

        return response()->json([
            'res' => true,
            'msn' => 'Registro actualizado correctamente'
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
        Presentation::destroy($id);

        return response()->json([
            'res' => true,
            'msn' => 'Registro eliminado correctamente'
        ], 200);
    }
}
