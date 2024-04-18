@extends('layouts.app')

@section('content')
    <div class="container ct1">
        <div class="ct2">

            <h1>Ingrese los datos para el envío</h1>
            <form method="POST" action="{{ route('carrito.comprar') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Apellido</label>
                    <input type="text" class="form-control" id="nombre" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                </div>
                <div class="form-group">
                    <label for="codigo_postal">Código Postal</label>
                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required>
                </div>
                <!-- Agrega más campos según tus necesidades -->
    
                <div class="botones-datos">
                    <a href="{{ route('carrito.ver') }}" class="btn btn-danger"><i class="fa-solid fa-backward"></i></a>
                    <button type="submit" class="btn btn-success btn-completar">Completar compra</button>

                </div>
    

                
            </form>
        </div>
    </div>
@endsection
