
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    
    @section('content')
        <section id="banner" class="banner">
            <div class="content-banner">
                <p>Mejor calidad</p>
                <h2>Lorem <br />Lorem, ipsum.</h2>
                <a href="#">Comprar ahora</a>
            </div>
        </section>
    
        <main class="main-content">
            <section class="container container-features">
                <div class="card-feature">
                    <i class="fa-solid fa-plane-up"></i>
                    <div class="feature-content">
                        <span>Envíos a bajo costo</span>
                        <p>En pedido superior a $10.000</p>
                    </div>
                </div>
                <div class="card-feature">
                    <i class="fa-solid fa-wallet"></i>
                    <div class="feature-content">
                        <span>Contrareembolso</span>
                        <p>100% garantía de devolución de dinero</p>
                    </div>
                </div>
                <div class="card-feature">
                    <i class="fa-solid fa-gift"></i>
                    <div class="feature-content">
                        <span>Tarjeta regalo especial</span>
                        <p>Ofrece bonos especiales con regalo</p>
                    </div>
                </div>
                <div class="card-feature">
                    <i class="fa-solid fa-headset"></i>
                    <div class="feature-content">
                        <span>Servicio al cliente</span>
                        <p>LLámenos al 123-456-7890</p>
                    </div>
                </div>
            </section>
    
            <section id="productos" class="container top-products">
                <h1 class="heading-1">Productos</h1>
    
                <div class="container-options">
    
                    <a href="{{ route('home') }}" class="boton-categorias">Todo</a>
    
                    @foreach ($categorias as $categoria)
                        <form action="{{ route('filtrar.productos') }}" method="post">
                            @csrf
                            <button class="boton-categorias" type="submit" name="categoria_id" value="{{ $categoria->id }}"
                                class="{{ $categoriaSeleccionada == $categoria->id ? 'active' : '' }}">{{ $categoria->nombre }}</button>
                        </form>
                    @endforeach
                </div>
    
    
                <div class="container-products">
                    @foreach ($productos as $producto)
                        <!-- Producto 1 -->
                        <div class="card-product">
                            <div class="container-img">
                                <img style="width: 217px" src="{{ asset('storage/' . $producto->imagen) }}"
                                    alt="{{ $producto->nombre }}" alt="Cafe Irish" />
                                <div class="button-group">
                                    <span>
                                        <i class="fa-regular fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="content-card-product">
                                <h3>{{ $producto->nombre }}</h3>
    
    
                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button style="border: none; background: transparent" type="submit" class="button-68 mb-3">
                                        <span class="add-cart">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                        </span></button>
                                </form>
    
    
    
    
                                <p class="price">${{ $producto->precio }} <span>$5.30</span></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
    
            <section id="galeria" class="gallery">
                <img src="img/gallery1.jpg" alt="Gallery Img1" class="gallery-img-1" /><img src="img/gallery2.jpg"
                    alt="Gallery Img2" class="gallery-img-2" /><img src="img/gallery3.jpg" alt="Gallery Img3"
                    class="gallery-img-3" /><img src="img/gallery4.jpg" alt="Gallery Img4" class="gallery-img-4" /><img
                    src="img/gallery5.jpg" alt="Gallery Img5" class="gallery-img-5" />
            </section>
    
            {{-- <section class="container blogs">
                <h1 class="heading-1">Últimos Blogs</h1>
    
                <div class="container-blogs">
                    <div class="card-blog">
                        <div class="container-img">
                            <img src="img/blog-1.jpg" alt="Imagen Blog 1" />
                            <div class="button-group-blog">
                                <span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-link"></i>
                                </span>
                            </div>
                        </div>
                        <div class="content-blog">
                            <h3>Lorem, ipsum dolor sit</h3>
                            <span>29 Noviembre 2022</span>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Iste, molestiae! Ratione et, dolore ipsum
                                quaerat iure illum reprehenderit non maxime amet dolor
                                voluptas facilis corporis, consequatur eius est sunt
                                suscipit?
                            </p>
                            <div class="btn-read-more">Leer más</div>
                        </div>
                    </div>
                    <div class="card-blog">
                        <div class="container-img">
                            <img src="img/blog-2.jpg" alt="Imagen Blog 2" />
                            <div class="button-group-blog">
                                <span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-link"></i>
                                </span>
                            </div>
                        </div>
                        <div class="content-blog">
                            <h3>Lorem, ipsum dolor sit</h3>
                            <span>29 Noviembre 2022</span>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Iste, molestiae! Ratione et, dolore ipsum
                                quaerat iure illum reprehenderit non maxime amet dolor
                                voluptas facilis corporis, consequatur eius est sunt
                                suscipit?
                            </p>
                            <div class="btn-read-more">Leer más</div>
                        </div>
                    </div>
                    <div class="card-blog">
                        <div class="container-img">
                            <img src="img/blog-3.jpg" alt="Imagen Blog 3" />
                            <div class="button-group-blog">
                                <span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <span>
                                    <i class="fa-solid fa-link"></i>
                                </span>
                            </div>
                        </div>
                        <div class="content-blog">
                            <h3>Lorem, ipsum dolor sit</h3>
                            <span>29 Noviembre 2022</span>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Iste, molestiae! Ratione et, dolore ipsum
                                quaerat iure illum reprehenderit non maxime amet dolor
                                voluptas facilis corporis, consequatur eius est sunt
                                suscipit?
                            </p>
                            <div class="btn-read-more">Leer más</div>
                        </div>
                    </div>
                </div>
            </section> --}}
        </main>
    @endsection
    
</body>
</html>
