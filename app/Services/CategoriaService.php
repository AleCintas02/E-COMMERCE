<?php

namespace App\Services;

use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class CategoriaService
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('opciones.admin-categorias', compact('categorias'));
    }

    public function guardarCategoria($nombre)
    {
        $categoria = Categoria::create([
            'nombre' => $nombre
        ]);
        return $categoria;
    }

    public function eliminarCategoria($id)
    {
        $categoria = Categoria::find($id);
        if(!$categoria){
            return false;
        }

        $categoria->delete();
        return true;
    }

    public function actualizarCategoria($id, $nombre)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return false;
        }

        $categoria->update([
            'nombre' => $nombre,
        ]);

        return true;
    }
}
