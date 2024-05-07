@extends('layouts.app')

@section('content')
    <div class="container ct1">
        <div class="ct2">

            @if ($carrito->isEmpty())
                <p>No hay productos en tu carrito.</p>
            @else
            <table class="table tabla">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
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
                            <td>
                                <!-- Botón para eliminar el producto -->
                                <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i> <!-- Ícono de una X -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">Total:</td>
                        <td style="color: rgb(19, 130, 19); font-size: 1.2rem">${{ $total }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="botones-carrito">
                <a href="{{ route('home') }}" class="btn btn-primary">Seguir comprando</a>
                <a href="{{ route('carrito.envio') }}" class="btn btn-success">Procesar pago</a>

            </div>

        </div>
        @endif
    </div>
@endsection
