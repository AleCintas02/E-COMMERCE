@extends('layouts.app')

@section('content')
    <h1>Ingrese su dirección de envío</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="post">
        @csrf
        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion"><br>
        <label for="ciudad">Ciudad:</label><br>
        <input type="text" id="ciudad" name="ciudad"><br><br>
        <button type="submit">Guardar dirección y continuar</button>
    </form>
@endsection
