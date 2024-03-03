<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Commerce</title>
</head>

<body>
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1>Productos</h1>
    @stop

    @section('content')

        <div class="container mt-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar producto
            </button>

            @include('modals.addProduct')


            <table id="tabla-nueva" class="table table-striped display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <th scope="row">{{ $producto->id }}</th>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td><img style="width: 100px" src="{{ asset('storage/' . $producto->imagen) }}"
                                    alt="{{ $producto->nombre }}"></td>
                            <td>
                                {{ $producto->stock > 0 ? $producto->stock : 'Sin stock' }}
                            </td>


                            <td style="color: green">${{ $producto->precio }}</td>
                            <td>
                                <span class="{{ $producto->categoria_id ? '' : 'text-danger' }}">
                                    {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editProductModal{{ $producto->id }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                            <td>
                                <form style="display: inline-block" id="form-delete-{{ $producto->id }}"
                                    action="{{ route('eliminar_producto', $producto->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="btn btn-danger btn-delete" data-form-id="form-delete-{{ $producto->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @include('modals.editProduct')
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </tfoot>
            </table>
        </div>



    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')

        <script src="https://kit.fontawesome.com/1d10b38d89.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>
    <script>
        $(document).ready(function() {
            $('#tabla-nueva').DataTable({
                responsive: true,
            });

            $('.btn-delete').on('click', function(e) {
                e.preventDefault();
                var formId = $(this).data('form-id');

                Swal.fire({
                    title: "¿Estás seguro que deseas eliminar este producto?",
                    text: "Esta acción no se puede deshacer.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#' + formId).submit();
                    }
                });
            });

            @if (session('success-delete-product'))
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Producto eliminado con exito",
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif


        });
    </script>
    <script>
        @if (session('success_product'))
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Producto guardado con exito",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if (session('success_product_update'))
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Producto editado con exito",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
@stop
</body>

</html>
