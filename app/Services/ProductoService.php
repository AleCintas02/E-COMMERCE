<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Producto;

class ProductoService
{


    public function listar()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('opciones.admin-productos', compact('productos', 'categorias'));
    }

    public function agregarProducto($request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp',
            'stock' => 'required|integer',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

        // Mover y almacenar la imagen en storage/imagenes
        $imagen->storeAs('public/imagenes', $nombreImagen);

        Producto::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => 'imagenes/' . $nombreImagen, // Ruta relativa a la carpeta storage
            'stock' => $request->input('stock'),
            'precio' => $request->input('precio'),
            'categoria_id' => $request->input('categoria_id'),
        ]);
        return true;
    }

    public function eliminarProducto($id)
    {
        // Buscar el producto por su ID
        $producto = Producto::find($id);

        if (!$producto) {
            return false; // El producto no existe
        }

        // Eliminar la imagen asociada (puedes utilizar unlink o Storage::delete)
        $imagenPath = public_path('storage/' . $producto->imagen);
        if (file_exists($imagenPath)) {
            unlink($imagenPath);
        }

        // Eliminar el producto de la base de datos
        $producto->delete();

        return true; // Producto eliminado exitosamente
    }

    public function obtenerProducto($id)
    {
        return Producto::find($id);
    }

    public function actualizarProducto($id, array $datos)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return false; // Producto no encontrado
        }

        $producto->update($datos);

        return true; // Producto actualizado exitosamente
    }

    public function obtenerProductoPorId($id)
    {
        return Producto::findOrFail($id);
    }
}
