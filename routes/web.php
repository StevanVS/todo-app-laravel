<?php

use App\Http\Controllers\WEB\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return redirect()->route('todos');
    return to_route('todos');
});

Route::get('/tareas', [TodoController::class, 'index'])->name('todos');
Route::get('/tareas/create', [TodoController::class, 'create']);
Route::get('/tareas/{id}', [TodoController::class, 'show']);

Route::post('/tareas', [TodoController::class, 'store'])->name('todos');

Route::get('/tareas/{id}/edit', [TodoController::class, 'edit'])->name('todo-edit');

Route::patch('/tareas/{id}', [TodoController::class, 'update'])->name('todo-update');

Route::delete('/tareas/{id}', [TodoController::class, 'destroy'])->name('todo-delete');


// Route::fallback(function () {
//     return to_route('todos');
// });
