@extends('layouts.app')

@section('content')
    <div class="container contenedor-confirmar">
        <div class="contenedor-formulario">
            <h1>Confirmar compra</h1>
            <h2>Datos de envío:</h2>
            <p>Nombre: {{ $datosEnvio['nombre'] }}</p>
            <p>Apellido: {{ $datosEnvio['apellido'] }}</p>
            <p>Dirección: {{ $datosEnvio['direccion'] }}</p>
            <p>Ciudad: {{ $datosEnvio['ciudad'] }}</p>
            <p>Código Postal: {{ $datosEnvio['codigo_postal'] }}</p>

            <h2>Productos en el carrito:</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrito as $item)
                        <tr>
                            <td>{{ $item->producto->nombre }}</td>
                            <td>${{ $item->producto->precio }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>${{ $item->producto->precio * $item->cantidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2 class="mb-3">Total: ${{ $total }}</h2>

            <div class="btn-group">
                <a href="{{ route('carrito.envio') }}" class="btn btn-danger"><i class="fa-solid fa-backward"></i></a>
                <form method="POST" action="{{ route('carrito.confirmar') }}">
                    @csrf
                    <!-- Añadir campos ocultos para enviar los datos de envío -->
                    <input type="hidden" name="nombre" value="{{ $datosEnvio['nombre'] }}">
                    <input type="hidden" name="apellido" value="{{ $datosEnvio['apellido'] }}">
                    <input type="hidden" name="direccion" value="{{ $datosEnvio['direccion'] }}">
                    <input type="hidden" name="ciudad" value="{{ $datosEnvio['ciudad'] }}">
                    <input type="hidden" name="codigo_postal" value="{{ $datosEnvio['codigo_postal'] }}">
                    <!-- Otros campos ocultos según tus necesidades -->
                    <button type="submit" class="btn btn-success">Confirmar compra</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
