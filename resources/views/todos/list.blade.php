@foreach ($todos as $t)
<li class="list-group-item d-flex align-items-center gap-2">
  {{-- <input class="form-check-input" type="checkbox"> --}}
  <div class="ms-1 flex-fill">{{ $t->title }}</div>
  
  @if ($t->category)
  <small class="badge text-black d-flex">
    <span class="border rounded-circle p-1" style="background-color: {{$t->color}};"></span>
    <span class="ms-1"> {{$t->category}} </span>
  </small>
  @endif

  @if ($t->date)
  <small class="text-secondary-emphasis text-end">{{ $t->date }}</small>
  @endif
  <div class="dropdown">
    <button class="btn btn-secondary btn-sm p-1 py-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      :
    </button>
    <ul class="dropdown-menu">
      <li><a href="{{ route('todo-edit', [$t->id]) }}" class="dropdown-item" type="button">Editar</a></li>
      <form action="{{ route('todo-delete', [$t->id]) }}" method="post">
        @method('DELETE')
        @csrf
        <li><button class="dropdown-item" type="submit">Eliminar</button></li>
      </form>
    </ul>
  </div>
</li>
@endforeach