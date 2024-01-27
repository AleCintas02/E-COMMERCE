<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $productosQuery = Producto::query();

        // Filtrar por categoría si se selecciona una
        if ($request->filled('categoria_id')) {
            $productosQuery->where('categoria_id', $request->input('categoria_id'));
        }

        $productos = $productosQuery->get();

        return view('home', compact('productos', 'categorias'));
    }
}
