@foreach ($categories as $c)
<li class="list-group-item d-flex align-items-center gap-2">
  <div class="p-2 border rounded" style="background-color: {{ $c->color }};"></div>
  <div class="flex-fill">{{ $c->name }}</div>
  <div class="dropdown">
    <button class="btn btn-secondary btn-sm p-1 py-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      :
    </button>
    <ul class="dropdown-menu">
      <li><a href="{{ route('categories.edit', [$c->id]) }}" class="dropdown-item" type="button">Editar</a></li>
      <form action="{{ route('categories.destroy', [$c->id]) }}" method="post">
        @method('DELETE')
        @csrf
        <li><button class="dropdown-item" type="submit">Eliminar</button></li>
      </form>
    </ul>
  </div>
</li>
@endforeach