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
        <h1>Administracion</h1>
    @stop

    @section('content')
        <div class="container-sm">
            <form action="">
                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
</body>

</html>
