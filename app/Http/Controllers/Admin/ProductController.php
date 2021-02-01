<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(Request $request)
    {
        if($request->has('search')) {
            $products = Product::where('name', 'like', '%' . $request->search . '%')
                                ->orWhere('brand', 'like', '%' . $request->search . '%')
                                ->with('category', 'presentation', 'ubication', 'provider')->get();
        } else {
            $products = Product::with('category', 'presentation', 'ubication', 'provider')
                                ->orderBy('id', 'desc')                    
                                ->get();
        }

        return $products;
    }

    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        Product::create($input);

        return response()->json([
            'res' => true,
            'msn' => 'Producto registrado correctamente'
        ], 200);
        
    }

    public function show($id)
    {
        //
    }

    public function update(CreateProductRequest $request, Product $product)
    {
        $input = $request->all();
        $product->update($input);

        return response()->json([
            'res' => true,
            'msn' => 'Producto actualizado correctamente'
        ], 200);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        
        return response()->json([
            'res' => true,
            'msn' => 'Registro eliminado correctamente'
        ], 200);
    }
}
