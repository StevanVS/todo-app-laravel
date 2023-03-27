@extends('index')
@section('form')
<form action="{{ route('categories.update', [$category->id]) }}" method="post">
  @csrf
  @method('PATCH')
  @include('categories.form')
  <div class="d-flex justify-content-between mt-2">
    <button class="btn btn-warning mb-0">Actualizar Categoria</button>
    <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancelar</a>
  </div>
</form>
@endsection

@section('list')
@include('categories.list')
@endsection