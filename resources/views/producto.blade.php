@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Chamb - Responsive E-commerce HTML5 Template</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--enable mobile device-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--fontawesome css-->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!--bootstrap css-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--animate css-->
        <link rel="stylesheet" href="css/animate-wow.css">
        <!--main css-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap-select.min.css">
        <link rel="stylesheet" href="css/slick.min.css">
        <link rel="stylesheet" href="css/select2.min.css">
        <!--responsive css-->
        <link rel="stylesheet" href="css/responsive.css">
    </head>

    <body>


        <div class="product-page-main">
            <div class="container">
                <div>
                    <div>
                        <div class="prod-page-title">
                            <h2>TITULO</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-7 col-sm-8">
                        <div class="md-prod-page">
                            <div class="md-prod-page-in">
                                <div class="page-preview">
                                    <div class="preview">
                                        <div class="preview-pic tab-content">
                                            <div class="tab-pane active" id="pic-1"><img src="images/lag-60.png"
                                                    alt="#" /></div>
                                            <div class="tab-pane" id="pic-2"><img src="images/lag-61.png"
                                                    alt="#" /></div>
                                            <div class="tab-pane" id="pic-3"><img src="images/lag-60.png"
                                                    alt="#" /></div>
                                            <div class="tab-pane" id="pic-4"><img src="images/lag-61.png"
                                                    alt="#" /></div>
                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                                        src="images/lag-60.png" alt="#" /></a></li>
                                            <li><a data-target="#pic-2" data-toggle="tab"><img src="images/lag-61.png"
                                                        alt="#" /></a></li>
                                            <li><a data-target="#pic-3" data-toggle="tab"><img src="images/lag-60.png"
                                                        alt="#" /></a></li>
                                            <li><a data-target="#pic-4" data-toggle="tab"><img src="images/lag-61.png"
                                                        alt="#" /></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="description-box">
                                <div class="dex-a">
                                    <h4>Description</h4>
                                    <p>DESCRIPCION
                                    </p>
                                    <br>
                                    <h4>TALLES</h4>
                                    <p>Small: H 25 cm / &Oslash; 12 cm</p>
                                    <p>Large H 24 cm / &Oslash; 25 cm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="price-box-right">
                            <h4>Precio</h4>
                            <h3>PRECIO</h3>

                            <a href="#">Agregar al carrito</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--main js-->
        <script src="js/jquery-1.12.4.min.js"></script>
        <!--bootstrap js-->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/select2.full.min.js"></script>
        <script src="js/wow.min.js"></script>
        <!--custom js-->
        <script src="js/custom.js"></script>
    </body>

    </html>
@endsection
