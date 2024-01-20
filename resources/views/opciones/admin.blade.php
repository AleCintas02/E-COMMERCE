<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1>Categorias</h1>
    @stop

    @section('content')

        <div class="contenedor-categorias">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('categoria.guardar') }}" method="POST">
                @csrf
                <label class="form-label" for="name">Nombre de la categoría:</label>
                <input class="form-control" type="text" name="nombre" id="name" required>
                <button class="btn btn-primary mt-3" type="submit">Agregar categoria</button>
            </form>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <th scope="row">{{ $categoria->id }}</th>
                            <td>{{ $categoria->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h1>Productos</h1>
        <div class="contenedor-productos">
            @if (session('success_product'))
                <div class="alert alert-success">
                    {{ session('success_product') }}
                </div>
            @endif
            <form method="post" action="{{ route('guardar_producto') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Subir imagen</label>
                    <input class="form-control" name="imagen" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label class="form-label">stock</label>
                    <input type="number" name="stock" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio" step="0.01" class="form-control">
                </div>
                <div class="mb-3">
                    <select class="form-select" name="categoria_id" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
</body>

</html>
