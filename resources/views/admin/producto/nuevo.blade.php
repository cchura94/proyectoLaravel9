<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Nuevo producto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="">Ingrese Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                    <label for="">Ingrese Precio</label>
                    <input type="number" step="0.01" class="form-control" name="precio">
                    <label for="">Ingrese Stock</label>
                    <input type="number" class="form-control" name="stock">
                    <label for="">Seleccionar Imagen</label>
                    <input type="file" name="imagen">
                    
                    <label for="">Seleccionar Categoria</label>
                    <select name="categoria_id" id="" class="form-control">
                        @foreach ($categorias as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option> 
                        @endforeach    
                    </select>
                    <label for="">Descripción</label>
                    <textarea name="descripcion" class="form-control"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>