<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('opciones.admin-productos', compact('productos', 'categorias'));
    }
    public function agregarProducto(Request $request)
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


        return redirect()->route('admin-productos')->with('success_product', 'Producto guardado exitosamente');
    }

    public function eliminarProducto($id)
    {
        // Buscar el producto por su ID
        $producto = Producto::find($id);

        if (!$producto) {
            // Manejar el caso en que el producto no existe
            return redirect()->back()->with('error-delete-product', 'Producto no encontrado.');
        }

        // Eliminar la imagen asociada (puedes utilizar unlink o Storage::delete)
        $imagenPath = public_path('storage/' . $producto->imagen);
        if (file_exists($imagenPath)) {
            unlink($imagenPath);
        }

        // Eliminar el producto de la base de datos
        $producto->delete();

        return redirect()->route('admin-productos')->with('success-delete-product', 'Producto eliminado exitosamente.');
    }

    public function editarProducto($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('admin-productos')->with('error-edit-product', 'Producto no encontrado.');
        }

        $categorias = Categoria::all();

        return view('modals.editProduct', compact('producto', 'categorias'));
    }

    public function actualizarProducto(Request $request, $id)
    {
        // Validación similar a la de agregarProducto
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,webp',
            'stock' => 'required|integer',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Obtener el producto
        $producto = Producto::find($id);

        // Verificar si el producto existe
        if (!$producto) {
            return redirect()->route('admin-productos')->with('error-update-product', 'Producto no encontrado.');
        }

        // Actualizar los campos del producto con los nuevos valores
        $producto->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'stock' => $request->input('stock'),
            'precio' => $request->input('precio'),
            'categoria_id' => $request->input('categoria_id'),
        ]);

        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

            // Eliminar la imagen existente
            Storage::delete('public/imagenes/' . basename($producto->imagen));

            // Mover y almacenar la nueva imagen en storage/imagenes
            $imagen->storeAs('public/imagenes', $nombreImagen);

            // Actualizar la ruta de la imagen en la base de datos
            $producto->update(['imagen' => 'imagenes/' . $nombreImagen]);
        }

        return redirect()->route('admin-productos')->with('success-update-product', 'Producto actualizado exitosamente.');
    }

    public function detalleProducto($id)
    {
        $producto = Producto::findOrFail($id);
        return view('detalles', compact('producto'));
    }
}
