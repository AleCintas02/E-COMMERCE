@extends('layouts.app')

@section('content')
    <div class="page-content-product" id="productos">
        <div class="main-product">
            <div class="container">
                <div class="row clearfix">
                    <div class="find-box mt-5">
                        <h1>Elige una categoría</h1>

                        <form action="{{ route('home') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <select class="form-select" name="categoria_id">
                                    <option value="">Todo</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                        <a href="{{ route('home') }}">Mostrar todo</a>


                    </div>
                </div>
                <div class="row clearfix">

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

                    {{-- <div class="categories_link">
                        <a href="#">Browse all categories here</a>
                    </div> --}}
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
                            <h4>“Chamb” Your Business</h4>
                            <p>Grow easily with chamb. Create free account.
                                We help expanding your business easily.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/create-icon.jpg" class="icon-small" alt="">
                            <h4>Create and add</h4>
                            <p>Grow easily with chamb. Create free account.
                                We help expanding your business easily.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeIn hidden-sm" data-wow-delay="0.4s">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/get-icon.jpg" class="icon-small" alt="">
                            <h4>Get inspired</h4>
                            <p>Grow easily with chamb. Create free account.
                                We help expanding your business easily.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
















<!-- HTML !-->
