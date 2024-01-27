<div class="modal fade" id="editProductModal{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $producto->id }}
                <form method="post" action="{{ route('actualizar_producto', $producto->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input value="{{ $producto->nombre }}" type="text" name="nombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input value="{{ $producto->descripcion }}" type="text" name="descripcion"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Subir imagen</label>
                        <input class="form-control" name="imagen" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">stock</label>
                        <input value="{{ $producto->stock }}" type="number" name="stock" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input value="{{ $producto->precio }}" type="number" name="precio" step="0.01"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="categoria_id" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ $categoria->id == $producto->categoria_id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
