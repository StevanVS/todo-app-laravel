<?php

namespace App\Http\Controllers\WEB;

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
        $category = null;

        return view('categories.index', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return to_route('categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255'
        ]);

        $category = Category::create([
            'name' => $validateData['name'],
            'color' => $validateData['color'],
            'status' => 1,
        ]);

        return to_route('categories.index')->with('success', 'Categoria creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return to_route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::where('status', 1)->get();
        $category = Category::find($id);
        if (is_null($category)) {
            return to_route('categories.index')->with('error', 'Categoria no encontrada');
        }
        return view('categories.edit', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return to_route('categories.index')->with('error', 'Categoria no encontrada');
        }

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255'
        ]);

        $category->name = $validateData['name'];
        $category->color = $validateData['color'];
        $category->save();

        return to_route('categories.index')->with('success', 'Categoria editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return to_route('categories.index')->with('error', 'Categoria no encontrada');
        }

        $category->status = 0;
        $category->save();

        return to_route('categories.index')->with('success', 'Categoria eliminada con exito');
    }
}
