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
    <title>Document</title>
</head>

<body>
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1>Mis pedidos</h1>
    @stop

    @section('content')

        <div class="container mt-4">

           
                <table id="tabla-nueva" class="table table-striped display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nro. pedido</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">apellido</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Código postal</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Detalles</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pedidos as $pedido)
                        {{-- @foreach ($pedido->detalles as $detalle) --}}
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->nombre }}</td>
                            <td>{{ $pedido->apellido }}</td>
                            <td>{{ $pedido->direccion }}</td>
                            <td>{{ $pedido->ciudad }}</td>
                            <td>{{ $pedido->codigo_postal }}</td>
                            <td>
                                @if ($pedido->estado == 'S')
                                    Entregado
                                @else
                                    Pendiente
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('mi-pedido-detalles', $pedido->id) }}"
                                    onclick="window.open(this.href,'_blank','width=600,height=400'); return false;"><i
                                        class="fa-solid fa-up-right-from-square"></i></a>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">Nro. pedido</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">apellido</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Código postal</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Detalles</th>
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
        });
    </script>
@stop
</body>

</html>
