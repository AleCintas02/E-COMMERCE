<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function agregarProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|string',
            'stock' => 'required|integer',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto = Producto::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $request->input('imagen'),
            'stock' => $request->input('stock'),
            'precio' => $request->input('precio'),
            'categoria_id' => $request->input('categoria_id'),
        ]);

        return redirect()->route('admin')->with('success_product', 'Producto guardado exitosamente');
    }
}
