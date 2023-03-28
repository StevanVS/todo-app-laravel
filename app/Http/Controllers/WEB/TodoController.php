<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    private function getTodos()
    {
        return DB::table('todos')
            ->leftJoin('categories', 'categories.id', '=', 'todos.category_id')
            ->select([
                'todos.*',
                'categories.name as category',
                'categories.color',
            ])
            ->where('categories.status', 1)
            ->orWhereNull('categories.status')
            ->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $todos = Todo::all();
        $todos = $this->getTodos();
        $todo = null;
        $categories = Category::where('status', 1)->get();
        return view('todos.index', [
            'todos' => $todos,
            'todo' => $todo,
            'categories' => $categories,
        ])->with('page', 'todos');
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
            'title'         => 'required|min:3',
            'date'          => 'nullable|date',
            'category_id'   => 'nullable|integer'
        ]);

        $todo = new Todo;
        $todo->title = $validateData['title'];
        $todo->date = $validateData['date'];
        $todo->category_id = $validateData['category_id'];

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
        $todos = $this->getTodos();
        $todo = Todo::find($id);
        $categories = Category::where('status', 1)->get();

        if (is_null($todo)) {
            return to_route('todos')->with('error', 'Tarea no encontrada');
        }

        return view('todos.edit', [
            'todo'          => $todo,
            'todos'         => $todos,
            'categories'    => $categories,
        ])->with('page', 'todos');
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
            'title'         => 'required|min:3',
            'date'          => 'nullable|date',
            'category_id'   => 'nullable|integer'
        ]);

        $todo->title = $validateData['title'];
        $todo->date = $request['date'];
        $todo->category_id = $request['category_id'];
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
