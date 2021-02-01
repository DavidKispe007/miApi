<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:categories'
        ]);

        Category::create($validated);

        return response()->json([
            'res' => true,
            'msn' => 'Categoría creada'
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        $validated  = $request->validate([
            'name' => 'required|min:3|unique:categories'
        ]);

        $category->update($validated);

        return response()->json([
            'res' => true,
            'msn' => 'Categoría editada'
        ], 200);
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return response()->json([
            'res' => true,
            'msn' => 'Categoría eliminada'
        ], 200);
    }
}
