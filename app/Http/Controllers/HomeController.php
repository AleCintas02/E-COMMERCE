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
    
        // Verifica si se ha enviado una categoría para filtrar
        $categoriaSeleccionada = $request->input('categoria_id', 0);
    
        if ($categoriaSeleccionada != 0) {
            $productosQuery->where('categoria_id', $categoriaSeleccionada);
        }
    
        $productos = $productosQuery->get();
    
        return view('home', compact('productos', 'categorias', 'categoriaSeleccionada'));
    }

    public function filtrarProductos(Request $request)
    {
        $categoriaId = $request->input('categoria_id');
        return redirect()->route('home', ['categoria_id' => $categoriaId]);
    }
}
