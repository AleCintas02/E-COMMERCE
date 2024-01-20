<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [CategoriaController::class, 'indexHome'])->name('home');
Route::view('/producto', 'producto')->name('producto');
Route::post('categorias/guardar', [CategoriaController::class, 'guardarCategoria'])->name('categoria.guardar');
Route::post('/guardar-producto', [ProductoController::class, 'agregarProducto'])->name('guardar_producto');

Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
    Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/panel', 'panel')->name('panel');
    Route::get('/admin', [CategoriaController::class, 'index'])->name('admin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
});
