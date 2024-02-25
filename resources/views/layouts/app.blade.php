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



    <!--fontawesome css-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('css/animate-wow.css') }}">
    <!--main css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.min.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/1d10b38d89.js" crossorigin="anonymous"></script>
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/carrito/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/carrito/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/carrito/custom.css') }}">




    <title>Document</title>
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
            <div class="main-footer" >
                <div class="container" >
                    {{-- <div class="row">
                        <div class="footer-top clearfix">
                            <div class="col-md-2 col-sm-6">
                                <h2>Start a free
                                    account today
                                </h2>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-box">
                                    <input type="text" placeholder="Enter yopur e-mail" />
                                    <button>Continue</button>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="help-box-f">
                                    <h4>Question? Call us on 12 34 56 78 for help</h4>
                                    <p>Easy setup - no payment fees - up to 100 products for free</p>
                                </div>
                            </div>
                        </div>
                        <div class="footer-link-box clearfix">
                            <div class="col-md-6 col-sm-6">
                                <div class="left-f-box">
                                    <div class="col-sm-4">
                                        <h2>SELL ON chamb</h2>
                                        <ul>
                                            <li><a href="#">Create account</a></li>
                                            <li><a href="howitworks.html">How it works suppliers</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="#">FAQ for Suppliers</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h2>BUY ON chamb</h2>
                                        <ul>
                                            <li><a href="#">Create account</a></li>
                                            <li><a href="#">How it works buyers</a></li>
                                            <li><a href="#">Categories</a></li>
                                            <li><a href="#">FAQ for buyers</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <h2>COMPANY</h2>
                                        <ul>
                                            <li><a href="about-us.html">About chamb</a></li>
                                            <li><a href="#">Contact us</a></li>
                                            <li><a href="#">Press</a></li>
                                            <li><a href="#">Careers</a></li>
                                            <li><a href="#">Terms of use</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="right-f-box">
                                    <h2>INDUSTRIES</h2>
                                    <ul class="col-sm-4">
                                        <li><a href="#">Textiles</a></li>
                                        <li><a href="#">Furniture</a></li>
                                        <li><a href="#">Leather</a></li>
                                        <li><a href="#">Agriculture</a></li>
                                        <li><a href="#">Food & drinks</a></li>
                                    </ul>
                                    <ul class="col-sm-4">
                                        <li><a href="#">Office</a></li>
                                        <li><a href="#">Decoratives</a></li>
                                        <li><a href="#">Electronics</a></li>
                                        <li><a href="#">Machines</a></li>
                                        <li><a href="#">Building</a></li>
                                    </ul>
                                    <ul class="col-sm-4">
                                        <li><a href="#">Cosmetics</a></li>
                                        <li><a href="#">Health</a></li>
                                        <li><a href="#">Jewelry</a></li>
                                        <li><a href="#">See all here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <p> Todos los derechos reservados. Alejandro Cintas &copy 2024</p>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/wow.min.js"></script>
    <!--custom js-->
    <script src="js/custom.js"></script>


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
