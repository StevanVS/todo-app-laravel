@extends('index')
@section('form')
<form action="{{ route('categories.store') }}" method="post">
  @csrf
  @include('categories.form')
  <button class="btn btn-primary mt-2 mb-0">Agregar Categoria</button>
  @if (session('success'))
  <h6 class="alert alert-success mt-3 mb-0">{{ session('success') }}</h6>
  @endif
  @if (session('error'))
  <h6 class="alert alert-danger mt-3 mb-0">{{ session('error') }}</h6>
  @endif
</form>
@endsection

@section('list')
@include('categories.list')
@endsection