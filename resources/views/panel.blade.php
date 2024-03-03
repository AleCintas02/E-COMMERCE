<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/panel.css')}}">
    <title>Panel</title>
</head>

<body>
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')

    @stop

    @section('content')
    <div class="contenedor-panel">
        
        @if (auth()->user()->role == 'root')
            <div class="alert alert-info">Bienvenido, {{ Auth::user()->nombre }}!. En el menu de opciones, podrás ver una
                opción llamada "ADMIN" en la que tendrás acceso la administración de la empresa</div>
        @else
            <div class="alert alert-info">Bienvenido, {{ Auth::user()->nombre }}!. <br> IMPORTANTE:</strong> Esto es un simulador de un
                E-Commerce completamente autogestionable y con todas sus funcionalidades, por ejemplo, agregar
                productos, agregar categorias, gestionar pedidos, filtrar pedidos, etc. Las compras y pedidos que se
                realizan, NO se cobran ni son reales. Para ver las opciones de administrador se necesitan permisos
                especiales del desarrollador.</div>
        @endif
    </div>

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script></script>
    @stop
</body>

</html>
