@extends('index')
@section('content')
<div class="row justify-content-center ">
  <div class="col-md-4 ">
    <form action="{{ route('todos') }}" method="post" class="border rounded p-3 shadow-sm">
      @csrf
      <div class="mb-3">
        <label for="titleInput" class="form-label">Tarea</label>
        <input type="text" name="title" class="form-control" id="titleInput" autofocus>
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
        <input type="datetime-local" name="date" class="form-control" id="datetimeInput">
      </div>
      <button class="btn btn-primary mt-2 mb-0">Agregar Tarea</button>
      @if (session('success'))
      <h6 class="alert alert-success mt-3 mb-0">{{ session('success') }}</h6>
      @endif
      @if (session('error'))
      <h6 class="alert alert-danger mt-3 mb-0">{{ session('error') }}</h6>
      @endif
    </form>
  </div>
  <div class="col-md-8">
    @include('todos.todo-list')
  </div>
</div>
@endsection