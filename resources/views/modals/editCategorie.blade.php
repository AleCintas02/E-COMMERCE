<div class="modal fade" id="editCategorie{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('actualizar_categoria', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="form-label" for="name">Nombre de la categoría:</label>
                    <input value="{{$categoria->nombre}}" class="form-control" type="text" name="nombre" id="name" required>
                    <button class="btn btn-primary mt-3" type="submit">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>