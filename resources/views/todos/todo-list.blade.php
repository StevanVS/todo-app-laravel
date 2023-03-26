<ul class="list-group mt-3 mt-md-0 shadow-sm">
  @foreach ($todos as $todo)
  <li class="list-group-item d-flex align-items-center gap-2">
    <input class="form-check-input" type="checkbox">
    <div class="ms-1 flex-fill">{{ $todo->title }}</div>
    {{-- <small class="badge" style="background-color: #0a0;">Categoria</small> --}}
    @if ($todo->date)
    <small class="text-secondary-emphasis text-end">{{ $todo->date }}</small>
    @endif
    <div class="dropdown">
      <button class="btn btn-secondary btn-sm p-1 py-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        :
      </button>
      <ul class="dropdown-menu">
        <li><a href="{{ route('todo-edit', [$todo->id]) }}" class="dropdown-item" type="button">Editar</a></li>
        <form action="{{ route('todo-delete', [$todo->id]) }}" method="post">
          @method('DELETE')
          @csrf
          <li><button class="dropdown-item" type="submit">Eliminar</button></li>
        </form>
      </ul>
    </div>
  </li>
  @endforeach
</ul>