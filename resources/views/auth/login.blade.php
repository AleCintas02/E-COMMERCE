<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    @extends('layouts.app')

    @section('content')
        <section class="vh-100 bg-image">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Iniciar sesión</h2>
                                    @error('error')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <form action="{{ route('inicia-sesion') }}" method="post">
                                        @csrf

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form3Example3cg" class="form-control form-control-lg"
                                                name="correo" placeholder="Correo" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example4cg" class="form-control form-control-lg"
                                                name="password" placeholder="Contraseña" />
                                        </div>


                                        <div class="d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Ingresar</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">No tienes cuenta? <a
                                                href="{{ route('register') }}"
                                                class="fw-bold text-body"><u>Registrarse</u></a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
