<?php

namespace App\Http\Controllers\WEB;

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
        return view('todos.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return to_route('todos');
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

        $todo = new Todo;
        $todo->title = $validateData['title'];
        $todo->date = $request['date'];

        $todo->save();

        return to_route('todos')->with('success', 'Tarea creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return to_route('todos');
    }

    /**
     * Show the form for editing the specified resource.
     * /todo/{id}/edit
     */
    public function edit(string $id)
    {
        $todos = Todo::all();
        $todo = Todo::find($id);

        if (is_null($todo)) {
            return to_route('todos')->with('error', 'Tarea no encontrada');
        }

        return view('todos.edit', ['todo' => $todo, 'todos' => $todos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todo::find($id);

        if (is_null($todo)) {
            return to_route('todos')->with('error', 'Tarea no encontrada');
        }

        $validateData = $request->validate([
            'title' => 'required|min:3',
            'date' => 'nullable|date'
        ]);

        $todo->title = $validateData['title'];
        $todo->date = $request['date'];
        $todo->save();

        return to_route('todos')->with('success', 'Tarea Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return to_route('todos')->with('error', 'Tarea no encontrada');
        }
        $todo->delete();

        return to_route('todos')->with('success', 'Tarea Eliminada');
    }
}
