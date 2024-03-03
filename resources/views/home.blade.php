@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="page-content-product" id="productos">
        <div class="main-product">
            <div class="container">
                <div>
                    <div class="find-box mt-5">
                        <div class="alert alert-info"><strong>IMPORTANTE:</strong> Esto es un simulador de un
                            E-Commerce completamente autogestionable y con todas sus funcionalidades, por ejemplo, agregar
                            productos, agregar categorias, gestionar pedidos, filtrar pedidos, etc. Las compras y pedidos que se
                            realizan, NO se cobran ni son reales. Para ver las opciones de administrador se necesitan permisos
                            especiales del desarrollador.</div>
                        <h1>Elige una categoría</h1>

                        <form action="{{ route('home') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <select class="form-select" name="categoria_id">
                                    <option>Todo</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                        <a class="todo" href="{{ route('home') }}">Mostrar todo</a>
                    </div>
                </div>
                <div>
                    @if ($productos->isEmpty())
                        <p>No hay productos en esta categoría.</p>
                    @else
                        @foreach ($productos as $producto)
                            <div class="col-lg-3 col-sm-6 col-md-3">
                                <div class="box-img">
                                    <h4>{{ $producto->nombre }}</h4>
                                    <img class="img-product" src="{{ asset('storage/' . $producto->imagen) }}"
                                        alt="{{ $producto->nombre }}">
                                    <h4>${{ $producto->precio }}</h4>
                                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="button-68 mb-3">Agregar al carrito</button>
                                    </form>
                                    <br>
                                    <a href="{{ route('producto-detalle', $producto->id) }}" class="mas-info">Mas info</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="cat-main-box">
        <div class="container">
            <div class="row panel-row">
                <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.0s">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/xpann-icon.jpg" class="icon-small" alt="">
                            <h4>Lorem, ipsum dolor.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, nisi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/create-icon.jpg" class="icon-small" alt="">
                            <h4>Lorem, ipsum dolor.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, nisi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeIn hidden-sm" data-wow-delay="0.4s">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/get-icon.jpg" class="icon-small" alt="">
                            <h4>Lorem, ipsum dolor.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, nisi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
