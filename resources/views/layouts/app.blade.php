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


    <!--main css-->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!--responsive css-->
    <script src="https://kit.fontawesome.com/1d10b38d89.js" crossorigin="anonymous"></script>
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/carrito/style.css') }}">
    <!-- Responsive CSS -->





    <title>E-Commerce</title>
</head>

<body>
    @section('header')


        <header>
            <div class="container-hero">
                <div class="container hero">
                    <div class="customer-support">
                        <i class="fa-solid fa-headset"></i>
                        <div class="content-customer-support">
                            <span class="text">Ayuda</span>
                            <span class="number">123-456-7890</span>
                        </div>
                    </div>

                    <div class="container-logo">
                        <i class="fa-solid fa-shop"></i>
                        <h1 class="logo"><a href="/">E-Commerce</a></h1>
                    </div>

                    <div class="container-user">
                        @auth
                            <a href="{{ route('panel') }}"><i class="fa-solid fa-user"></i></a>
                        @else
                            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @endauth
                        <a href="{{ route('carrito.ver') }}">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </a>
                        <div class="content-shopping-cart">

                            <span class="text">Carrito</span>

                            @auth
                                @if (Auth::user()->carritos->sum('cantidad') > 0)
                                    <span class="number">({{ Auth::user()->carritos->sum('cantidad') }})</span>
                                @endif
                            @endauth

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-navbar">
                <nav class="navbar container">
                    <i class="fa-solid fa-bars"></i>
                    <ul class="menu">
                        <li><a href="#banner">Inicio</a></li>
                        <li><a href="#productos">Productos</a></li>
                        <li><a href="#galeria">Galeria</a></li>
                    </ul>
                </nav>
            </div>
        </header>


    @show


    <div>
        @yield('content')
    </div>

    @section('footer')
        {{-- <footer>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <p>&copy Alejandro Cintas 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer> --}}


        <footer class="footer">
            <div class="container container-footer">
                <div class="menu-footer">
                    <div class="contact-info">
                        <p class="title-footer">Información de Contacto</p>
                        <ul>
                            <li>
                                Dirección: Lorem ipsum dolor sit.
                                06066
                            </li>
                            <li>Teléfono: 123-456-7890</li>
                            <li>EmaiL: example@support.com</li>
                        </ul>
                        <div class="social-icons">
                            <span class="facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </span>
                            <span class="twitter">
                                <i class="fa-brands fa-twitter"></i>
                            </span>
                            <span class="youtube">
                                <i class="fa-brands fa-youtube"></i>
                            </span>
                            <span class="pinterest">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </span>
                            <span class="instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </span>
                        </div>
                    </div>

                    <div class="information">
                        <p class="title-footer">Información</p>
                        <ul>
                            <li><a href="#">Acerca de Nosotros</a></li>
                            <li><a href="#">Información envíos</a></li>
                            <li><a href="#">Politicas de Privacidad</a></li>
                            <li><a href="#">Términos y condiciones</a></li>
                            <li><a href="#">Contactános</a></li>
                        </ul>
                    </div>

                    <div class="my-account">
                        <p class="title-footer">Mi cuenta</p>

                        <ul>
                            <li><a href="#">Mi cuenta</a></li>
                            <li><a href="#">Historial de pedidos</a></li>
                            <li><a href="#">Carrito</a></li>
                            <li><a href="#">Boletín</a></li>
                            <li><a href="#">Reembolsos</a></li>
                        </ul>
                    </div>

                    <div class="newsletter">
                        <p class="title-footer">Boletín informativo</p>

                        <div class="content">
                            <p>
                                Suscríbete a nuestros boletines ahora y mantente al
                                día con nuevas colecciones y ofertas exclusivas.
                            </p>
                            <input type="email" placeholder="Ingresa el correo aquí...">
                            <button>Suscríbete</button>
                        </div>
                    </div>
                </div>

                <div class="copyright">
                    <p>
                        Desarrollado por Alejandro &copy; 2024
                    </p>

                    <img src="img/payment.png" alt="Pagos">
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
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!--custom js-->
    <script src="{{ asset('js/custom.js') }}"></script>


    <script src="https://kit.fontawesome.com/1d10b38d89.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
