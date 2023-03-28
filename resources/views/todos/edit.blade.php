@extends('index')

@section('form')
<form action="{{route('todo-update', [$todo->id])}}" method="post">
  @csrf
  @method('PATCH')
  @include('todos.form')
  <div class="d-flex justify-content-between mt-2">
    <button class="btn btn-warning mb-0">Actualizar Tarea</button>
    <a href="{{ route('todos') }}" class="btn btn-danger">Cancelar</a>
  </div>
</form>
@endsection

@section('list')
@include('todos.list')
@endsection