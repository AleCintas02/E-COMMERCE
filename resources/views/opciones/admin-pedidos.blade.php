<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('css/detalles_pedidos.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    @extends('adminlte::page')
    @section('title', 'Dashboard')
    @section('content_header')
        <h1>Pedidos</h1>
    @stop
    @section('content')
        <div class="container mt-4">
            <form action="{{ route('filtrar-pedidos') }}" method="GET">
                <div class="mb-3">
                    <label for="estado" class="form-label">Filtrar por estado:</label>
                    <select name="estado" id="estado" class="form-select">
                        <option value="todos">Todos</option>
                        <option value="entregados">Entregados</option>
                        <option value="pendientes">Pendientes</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
            <br>
            <table id="tabla-nueva" class="table table-striped display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Código postal</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <th scope="row">{{ $pedido->id }}</th>
                            <td>{{ $pedido->nombre }}</td>
                            <td>{{ $pedido->apellido }}</td>
                            <td>{{ $pedido->direccion }}</td>
                            <td>{{ $pedido->ciudad }}</td>
                            <td>{{ $pedido->codigo_postal }}</td>
                            <td>
                                <a href="{{ route('pedido-detalle', $pedido->id) }}"
                                    onclick="window.open(this.href,'_blank','width=600,height=400'); return false;"><i
                                        class="fa-solid fa-up-right-from-square"></i></a>
                            </td>
                            <td>
                                <button id="entregarPedido" type="button"
                                    class="btn @if ($pedido->estado == 'S') btn-success @else btn-danger @endif"
                                    data-id="{{ $pedido->id }}">
                                    <i class="fa-solid fa-check"></i>
                                    @if ($pedido->estado == 'S')
                                        Entregado
                                    @else
                                        Pendiente
                                    @endif
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Código postal</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Estado</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>

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
        });

        document.querySelectorAll('#entregarPedido').forEach(button => {
            button.addEventListener('click', function() {
                const pedidoId = this.getAttribute('data-id');
                fetch(`/cambiar-estado-pedido/${pedidoId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            if (data.estado === 'S') {
                                this.classList.remove('btn-danger');
                                this.classList.add('btn-success');
                                this.innerHTML = '<i class="fa-solid fa-check"></i> Entregado';
                            } else {
                                this.classList.remove('btn-success');
                                this.classList.add('btn-danger');
                                this.innerHTML = '<i class="fa-solid fa-check"></i> Pendiente';
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@stop
</body>

</html>
