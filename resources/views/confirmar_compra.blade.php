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
                {{-- @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto['nombre'] }}</td>
                        <td>{{ $producto['cantidad'] }}</td>
                        <td>${{ $producto['precio_unitario'] }}</td>
                        <td>${{ $producto['subtotal'] }}</td>
                    </tr>
                @endforeach --}}
            </table>

            <h2>Total: ${{ $total }}</h2>

            <div class="btn-group">
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
                <a href="{{ route('carrito.envio') }}" class="btn btn-secondary">Atrás</a>
            </div>
        </div>
    </div>
@endsection
