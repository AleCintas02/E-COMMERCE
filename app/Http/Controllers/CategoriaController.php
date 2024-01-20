<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('opciones.admin', compact('categorias'));
    }
    public function indexHome()
    {
        $categorias = Categoria::all();
        return view('home', compact('categorias'));
    }

    public function guardarCategoria(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Categoria::create([
            'nombre' => $request->input('nombre'),
        ]);

        return redirect()->route('admin')->with('success', 'Categoría guardada exitosamente');
    }
}
