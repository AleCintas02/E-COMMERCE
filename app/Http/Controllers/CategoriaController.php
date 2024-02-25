<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }
    public function index()
    {
        return $this->categoriaService->index();
    }

    public function guardarCategoria(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $this->categoriaService->guardarCategoria($request->input('nombre'));

        return redirect()->route('admin-categorias')->with('success', 'Categoría guardada exitosamente');
    }

    public function eliminarCategoria($id)
    {
        $success = $this->categoriaService->eliminarCategoria($id);

        if ($success) {
            return redirect()->route('admin-categorias')->with('success-delete-categorie', 'Categoria eliminada exitosamente.');
        } else {
            return redirect()->back()->with('error-delete-categorie', 'Categoria no encontrada.');
        }
    }


    public function actualizarCategoria(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $success = $this->categoriaService->actualizarCategoria($id, $request->input('nombre'));

        if ($success) {
            return redirect()->route('admin-categorias')->with('success-update-categoria', 'Categoria actualizada exitosamente.');
        } else {
            return redirect()->route('admin-categorias')->with('error-update-categoria', 'Categoria no encontrada.');
        }
    }
}
