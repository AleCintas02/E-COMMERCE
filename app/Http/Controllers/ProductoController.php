<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Services\ProductoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    protected $productoService;

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = $this->productoService->listar();
        return $productos;
    }
    public function agregarProducto(Request $request)
    {
        $exito =  $this->productoService->agregarProducto($request);
        if (!$exito) {
            return redirect()->route('admin-productos')->with('error', 'Error al guardar el producto');
        }

        return redirect()->route('admin-productos')->with('success_product', 'Producto guardado exitosamente');
    }

    public function eliminarProducto($id)
    {
        $exito = $this->productoService->eliminarProducto($id);

        if ($exito) {
            return redirect()->route('admin-productos')->with('success-delete-product', 'Producto eliminado exitosamente.');
        } else {
            return redirect()->back()->with('error-delete-product', 'Producto no encontrado.');
        }
    }

    public function editarProducto($id)
    {
        $producto = $this->productoService->obtenerProducto($id);

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

        $datos = [
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'stock' => $request->input('stock'),
            'precio' => $request->input('precio'),
            'categoria_id' => $request->input('categoria_id'),
        ];

        // Verificar si se proporcionó una nueva imagen
        if ($request->hasFile('imagen')) {
            // Obtener el producto
            $producto = Producto::find($id);

            // Verificar si el producto existe
            if (!$producto) {
                return redirect()->route('admin-productos')->with('error-update-product', 'Producto no encontrado.');
            }

            // Eliminar la imagen existente
            Storage::delete('public/imagenes/' . basename($producto->imagen));

            // Mover y almacenar la nueva imagen en storage/imagenes
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/imagenes', $nombreImagen);

            // Actualizar la ruta de la imagen en los datos
            $datos['imagen'] = 'imagenes/' . $nombreImagen;
        }

        $exito = $this->productoService->actualizarProducto($id, $datos);

        if ($exito) {
            return redirect()->route('admin-productos')->with('success-update-product', 'Producto actualizado exitosamente.');
        } else {
            return redirect()->route('admin-productos')->with('error-update-product', 'Producto no encontrado.');
        }
    }


    public function detalleProducto($id)
    {
        $producto = $this->productoService->obtenerProductoPorId($id);

        return view('detalles', ['producto' => $producto]);
    }
}
