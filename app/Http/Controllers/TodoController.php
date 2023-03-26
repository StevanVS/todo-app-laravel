<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'nullable|date'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->date = $request->date;

        $todo->save();

        return to_route('todos')->with('success', 'Tarea creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * /todo/{id}/edit
     */
    public function edit(string $id)
    {
        $todos = Todo::all();
        $todo = Todo::find($id);

        return view('todos.edit', ['todo' => $todo, 'todos' => $todos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->date = $request->date;
        $todo->save();

        return to_route('todos')->with('success', 'Tarea Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return to_route('todos')->with('success', 'Tarea Eliminada');
    }
}
