<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('opciones.admin-categorias', compact('categorias'));
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

        return redirect()->route('admin-categorias')->with('success', 'Categoría guardada exitosamente');
    }

    public function eliminarCategoria($id)
    {
        // Buscar el producto por su ID
        $categoria = Categoria::find($id);

        if (!$categoria) {
            // Manejar el caso en que el producto no existe
            return redirect()->back()->with('error-delete-categorie', 'Categoria no encontrado.');
        }


        // Eliminar el producto de la base de datos
        $categoria->delete();

        return redirect()->route('admin-categorias')->with('success-delete-categorie', 'Categoria eliminada exitosamente.');
    }


    public function actualizarCategoria(Request $request, $id)
    {
        // Validación similar a la de agregarProducto
        $request->validate([
            'nombre' => 'required|string',

        ]);

        // Obtener el producto
        $categoria = Categoria::find($id);

        // Verificar si el producto existe
        if (!$categoria) {
            return redirect()->route('admin-productos')->with('error-update-categoria', 'Categoria no encontrado.');
        }

        // Actualizar los campos del producto con los nuevos valores
        $categoria->update([
            'nombre' => $request->input('nombre'),
        ]);



        return redirect()->route('admin-categorias')->with('success-update-categoria', 'Categoria actualizada exitosamente.');
    }
}
