<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3',
            'date' => 'nullable|date'
        ]);

        $todo = Todo::create([
            'title' => $validateData['title'],
            'date' => $validateData['date'],
        ]);

        return response()->json(['message' => 'Tarea creada con exito.'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::find($id);

        if (is_null($todo)) {
            return response()->json(['message' => 'Tarea no encontrada.'], 404);
        }

        return response()->json($todo, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Tarea no encontrada.'], 404);
        }

        $validateData = $request->validate([
            'title' => 'required|min:3',
            'date'  => 'nullable|date'
        ]);

        $todo->title    = $validateData['title'];
        $todo->date     = $validateData['date'];
        $todo->save();

        return response()->json(['message' => 'Tarea actualizada con exito.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Tarea no encontrada.'], 404);
        }

        $todo->delete();
        return response()->json(['message' => 'Tarea eliminada con exito.'], 200);
    }
}
