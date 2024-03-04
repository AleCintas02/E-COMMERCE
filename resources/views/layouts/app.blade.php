<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('css/animate-wow.css') }}">
    <!--main css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/1d10b38d89.js" crossorigin="anonymous"></script>
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/carrito/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/carrito/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/carrito/custom.css') }}">




    <title>E-Commerce</title>
</head>

<body>
    @section('header')
        <header id="header" class="top-head">
            <nav>
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label>
                <a href="{{ route('home') }}" class="logo">logo</a>
                <ul>
                    <li style="padding-right: 20px">
                        <a href="{{ route('carrito.ver') }}">
                            <i class="fas fa-shopping-cart"></i>
                            @auth
                                @if (Auth::user()->carritos->sum('cantidad') > 0)
                                    <span class="badge"
                                        style=" position: absolute; margin-right: 100px; margin-top: 30px;">{{ Auth::user()->carritos->sum('cantidad') }}</span>
                                @endif
                            @endauth
                        </a>
                    </li>
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    @auth
                        <li><a href="{{ route('panel') }}">Cuenta</a></li>


                        <li><a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                    @else
                        <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                        <li><a href="{{ route('register') }}">Registrarse</a></li>
                    @endauth
                </ul>
            </nav>
        </header>

    @show


    <div>
        @yield('content')
    </div>

    @section('footer')
        <footer>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <p>&copy Alejandro Cintas 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @show

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!--main js-->
    <script src="js/jquery-1.12.4.min.js"></script>
    <!--bootstrap js-->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <!--custom js-->
    <script src="{{asset('js/custom.js')}}"></script>


    <script src="https://kit.fontawesome.com/1d10b38d89.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script></script>
</body>

</html>
