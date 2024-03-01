@extends('layouts.app')

@section('content')
    <div class="product-page-main">
        <div class="container contenedor-confirmar">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-md-2 col-sm-4">
                    <div class="left-profile-box-m prod-page">
                        <div class="pof-text">

                            <div class="check-box"></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7 col-sm-8">
                    <div class="md-prod-page">
                        <div class="md-prod-page-in">
                            <div class="page-preview">
                                <div class="preview">
                                    <div class="preview-pic imagen-detalle">
                                        <div class="tab-pane active" id="pic-1"><img style="width: 500px"
                                                src="{{ asset('storage/' . $producto->imagen) }}"
                                                alt="{{ $producto->nombre }}" /></div>

                                    </div>
                                </div>
                            </div>
                            <div class="btn-dit-list clearfix">
                            </div>
                        </div>
                        <div class="description-box">
                            <div class="dex-a">
                                <h4>Descripcion</h4>
                                <p>{{ $producto->descripcion }}
                                </p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="price-box-right">
                        <h4>Precio</h4>
                        <h3>${{ $producto->precio }} </h3>
                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
