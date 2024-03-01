<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        
    @stop

    @section('content')
        @if (auth()->user()->role == 'root')
            <p>Bienvenido, {{ Auth::user()->nombre }}!. En el menu de opciones, podrás ver una opción llamada "ADMIN" en la que tendrás acceso la administración de la empresa</p>
        @else
        <p>Bienvenido, {{ Auth::user()->nombre }}!. Estas en modo usuario, para conocer mas opciones de administrador comunicate con el desarrollador</p>
        @endif
        
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            
        </script>
    @stop
</body>

</html>
