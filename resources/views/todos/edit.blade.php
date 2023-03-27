@extends('index')

@section('form')
<form action="{{route('todo-update', [$todo->id])}}" method="post">
  @csrf
  @method('PATCH')
  <div class="mb-3">
    <label for="titleInput" class="form-label">Tarea</label>
    <input type="text" value="{{$todo->title}}" name="title" class="form-control" id="titleInput">
  </div>
  <!-- <div class="mb-3">
        <label for="descInput" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="descInput">
      </div> -->
  <!-- <div class="mb-3">
        <label for="categoryInput" class="form-label">Categoria</label>
        <select class="form-select" id="categoryInput" aria-label="Default select example">
          <option value="1">One</option>
          <option value="2">Two</option>
        </select>
      </div> -->
  <div class="mb-3">
    <label for="datetimeInput" class="form-label">Fecha</label>
    <input type="datetime-local" value="{{$todo->date}}" name="date" class="form-control" id="datetimeInput">
  </div>
  <div class="d-flex justify-content-between mt-2">
    <button class="btn btn-warning mb-0">Actualizar Tarea</button>
    <a href="{{ route('todos') }}" class="btn btn-danger">Cancelar</a>
  </div>
</form>
@endsection

@section('list')
@include('todos.todo-list')
@endsection