@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $producto->nombre }}</h2>
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid">
                <p>{{ $producto->descripcion }}</p>
                <p>Precio: ${{ $producto->precio }}</p>
                <!-- Otros detalles del producto aquí -->
            </div>
        </div>
    </div>
@endsection
