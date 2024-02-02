@extends('layouts.app')

@section('content')
    <h1>Confirmar compra</h1>
    <h2>Datos de envío:</h2>
    <p><strong>Dirección:</strong> {{ $direccionEnvio['direccion'] }}</p>
    <p><strong>Ciudad:</strong> {{ $direccionEnvio['ciudad'] }}</p>
    
    <h2>Resumen del pedido:</h2>
    <ul>
        @foreach ($carrito as $item)
            <li>{{ $item->producto->nombre }} - Cantidad: {{ $item->cantidad }} - Precio: {{ $item->producto->precio }}</li>
        @endforeach
    </ul>
    <p><strong>Total:</strong> {{ $total }}</p>

    <!-- Agrega aquí el botón para confirmar la compra -->
@endsection
