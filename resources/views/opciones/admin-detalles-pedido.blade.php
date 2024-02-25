<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles del Pedido</title>
</head>

<body>
    <h1>Detalles del Pedido</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Cantidad Pagada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->nombre_producto }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->cantidad_pagada }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
