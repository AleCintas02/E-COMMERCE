<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/ejemplo', function () {
    return view('ejemplo');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/producto/{id}', [ProductoController::class, 'detalleProducto'])->name('producto-detalle');



Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
    Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
});

Route::middleware(['auth', 'root'])->group(function () {
    // Rutas que requieren que el usuario tenga el rol "root"
    //opciones de administrador
    Route::get('/admin-categorias', [CategoriaController::class, 'index'])->name('admin-categorias');
    Route::get('/admin-productos', [ProductoController::class, 'index'])->name('admin-productos');
    Route::get('/admin-pedidos', [PedidoController::class, 'index'])->name('admin-pedidos');

    Route::get('/filtrar-pedidos', [PedidoController::class, 'filtrarPedidos'])->name('filtrar-pedidos');
    Route::post('/cambiar-estado-pedido/{id}', [PedidoController::class, 'cambiarEstadoPedido'])->name('pedido-estado');
    Route::get('/pedido/{id}', [PedidoController::class, 'detallePedido'])->name('pedido-detalle');

    Route::post('categorias/guardar', [CategoriaController::class, 'guardarCategoria'])->name('categoria.guardar');
    Route::post('/guardar-producto', [ProductoController::class, 'agregarProducto'])->name('guardar_producto');
    Route::delete('/eliminar-producto/{id}', [ProductoController::class, 'eliminarProducto'])->name('eliminar_producto');
    Route::put('/actualizar-producto/{id}', [ProductoController::class, 'actualizarProducto'])->name('actualizar_producto');
    Route::get('/editar-producto/{id}', [ProductoController::class, 'editarProducto'])->name('editar_producto');

    Route::get('/editar-CATEGORIA/{id}', [categoriaController::class, 'editarCategoria'])->name('editar_categoria');
    Route::delete('/eliminar-categoria/{id}', [CategoriaController::class, 'eliminarCategoria'])->name('eliminar_categoria');
    Route::put('/actualizar-categoria/{id}', [CategoriaController::class, 'actualizarCategoria'])->name('actualizar_categoria');
    //opciones de administrador
});


Route::middleware(['auth'])->group(function () {
    Route::view('/panel', 'panel')->name('panel');
    
    Route::post('/filtrar-productos', [HomeController::class, 'filtrarProductos'])->name('filtrar.productos');


    Route::get('/mis-pedidos', [PedidoController::class, 'misPedidos'])->name('mis-pedidos');
    Route::get('/pedido-detalle/{id}', [PedidoController::class, 'detalleMiPedido'])->name('mi-pedido-detalles');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Ruta para ver el contenido del carrito de compras
    Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');

    // Ruta para agregar un producto al carrito de compras
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarProducto'])->name('carrito.agregar');

    // Ruta para eliminar un producto del carrito de compras
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminarProducto'])->name('carrito.eliminar');

    // Ruta para realizar el proceso de compra
    Route::post('/carrito/comprar', [CarritoController::class, 'comprar'])->name('carrito.comprar');

    Route::get('/carrito/envio', [CarritoController::class, 'ingresarDatosEnvio'])->name('carrito.envio');

    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmarCompra'])->name('carrito.confirmar');
});
