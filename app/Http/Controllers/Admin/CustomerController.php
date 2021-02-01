<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('search')) {
            $data = Customer::where('name', 'like', '%' . $request->search . '%')
                                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                                ->with('district')->get();
        } else {
            $data = Customer::with('district')->orderBy('id', 'desc')->get();
        }

        return $data;
    }

   
    public function store(CreateCustomerRequest $request)
    {
        $input = $request->all();

        Customer::create($input);

        return response()->json([
            'res' => true,
            'msn' => 'Cliente registrado correctamente'
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
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $input = $request->all();
        $customer->update($input);

        return response()->json([
            'res' => true,
            'msn' => 'Cliente actualizado correctamente'
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
        Customer::destroy($id);

        return response()->json([
            'res' => true,
            'msn' => 'Registro eliminado correctamente'
        ], 200);
    }
}
