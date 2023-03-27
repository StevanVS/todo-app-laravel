<div class="mb-3">
  <label for="titleInput" class="form-label">Categoria</label>
  <input type="text" @if ($category) value="{{$category->name}}" @endif name="name" class="form-control" id="titleInput"
    autofocus>
</div>

<div class="mb-3">
  <label for="colorInput" class="form-label">Color</label>
  <input type="color" @if ($category) value="{{$category->color}}" @endif name="color"
    class="form-control form-control-color w-100" id="colorInput">
</div>