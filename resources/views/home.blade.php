@extends('layouts.app')

@section('content')
    <div class="page-content-product" id="productos">
        <div class="main-product">
            <div class="container">
                <div class="row clearfix">
                    <div class="find-box">
                        <h1>Lorem, ipsum dolor.<br>Lorem, ipsum dolor.</h1>
                        {{-- <div class="product-sh">
                            <div class="col-sm-3">
                                <div class="form-sh">
                                    <select class="form-select">
                                        <option>Todo</option>
                                        <option>Remeras</option>
                                        <option>Pantalones</option>
                                        <option>Zapatillas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-sh"> <a class="btn" href="#">Buscar</a> </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="box-img">
                                <h4>Categoria 1</h4>
                                <img src="images/product/1.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="box-img">
                                <h4>Categoria 2</h4>
                                <img src="images/product/2.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="box-img">
                                <h4>Categoria 3</h4>
                                <img src="images/product/4.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="box-img">
                                <h4>Categoria 4</h4>
                                <img src="images/product/5.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="box-img">
                                <h4>Categoria 5</h4>
                                <img src="images/product/10.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="box-img">
                                <h4>Categoria 6</h4>
                                <img src="images/product/11.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="box-img">
                                <h4>Categoria 7</h4>
                                <img src="images/product/12.png" alt="" />
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="box-img">
                                <h4>Categoria 8</h4>
                                <img src="images/product/13.png" alt="" />
                            </div>
                        </a>
                    </div>
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
