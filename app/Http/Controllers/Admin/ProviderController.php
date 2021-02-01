<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('search')) {
            $providers = Provider::where('name', 'like', '%' . $request->search . '%')
                                ->orWhere('email', 'like', '%' . $request->search . '%')
                                ->with('category', 'distributor', 'district')->get();
        } else {
            $providers = Provider::with('category', 'distributor', 'district')
                                ->orderBy('id', 'desc')                    
                                ->get();
        }

        return $providers;
    }

    public function store(CreateProviderRequest $request)
    {
        $input = $request->all();

        Provider::create($input);

        return response()->json([
            'res' => true,
            'msn' => 'Proveedor registrado correctamente'
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

    public function update(CreateProviderRequest $request, Provider $provider)
    {
        $input = $request->all();
        $provider->update($input);

        return response()->json([
            'res' => true,
            'msn' => 'Proveedor actualizado correctamente'
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
        Provider::destroy($id);

        return response()->json([
            'res' => true,
            'msn' => 'Registro eliminado correctamente'
        ], 200);
    }
}
