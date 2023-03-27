<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255'
        ]);

        $category = Category::create([
            'name' => $validateData['name'],
            'color' => $validateData['color'],
            'status' => 1,
        ]);

        return response()->json(['message' => 'Categoria creada con exito.'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['message' => 'Categoria no encontrada.'], 404);
        }

        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(['message' => 'Categoria no encontrada.'], 404);
        }

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255'
        ]);

        $category->name = $validateData['name'];
        $category->color = $validateData['color'];
        $category->save();

        return response()->json(['message' => 'Categoria actualizada con exito.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(['message' => 'Categoria no encontrada.'], 404);
        }

        $category->status = 0;
        $category->save();

        return response()->json(['message' => 'Categoria eliminada con exito.'], 200);
    }
}
