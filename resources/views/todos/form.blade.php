<div class="mb-3">
  <label for="titleInput" class="form-label">Tarea</label>
  <input type="text" @if ($todo) value="{{$todo->title}}" @endif name="title" class="form-control" id="titleInput">
</div>
<div class="mb-3">
  <label for="categoryInput" class="form-label">Categoria</label>
  <select name="category_id" class="form-select" id="categoryInput" aria-label="Seleccionar categoria">
    <option value="">--Seleccionar</option>
    @foreach ($categories as $c)
    <option value="{{$c->id}}" @if ($todo and $c->id == $todo->category_id)
      selected
      @endif
      >{{$c->name}}
    </option>
    @endforeach
  </select>
</div>
<div class="mb-3">
  <label for="datetimeInput" class="form-label">Fecha</label>
  <input type="datetime-local" @if ($todo) value="{{$todo->date}}" @endif name="date" class="form-control"
    id="datetimeInput">
</div>