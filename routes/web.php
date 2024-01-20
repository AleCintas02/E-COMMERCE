<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
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

Route::view('/', 'home')->name('home');
Route::view('/producto', 'producto')->name('producto');

Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
    Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/panel', 'panel')->name('panel');
    Route::view('/admin', 'opciones.admin')->name('admin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/guardar_categoria', [CategoriaController::class, 'guardarCategoria'])->name('guardar_categoria');
});
