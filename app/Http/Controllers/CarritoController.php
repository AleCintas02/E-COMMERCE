<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function verCarrito()
    {
        // Lógica para mostrar el contenido del carrito de compras
        $carrito = Carrito::where('user_id', Auth::id())->get();

        // Calcular el total del carrito
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item->producto->precio * $item->cantidad;
        }

        return view('carrito', compact('carrito', 'total'));
    }

    public function agregarProducto(Request $request, $id)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener el producto por su ID
        $producto = Producto::findOrFail($id);

        // Verificar si ya existe un registro en el carrito para el usuario y el producto
        $carrito = Carrito::where('user_id', $user->id)
            ->where('producto_id', $producto->id)
            ->first();

        // Si el producto ya está en el carrito, aumentar la cantidad
        if ($carrito) {
            $carrito->cantidad += 1;
            $carrito->save();
        } else {
            // Crear un nuevo registro en el carrito
            Carrito::create([
                'user_id' => $user->id,
                'producto_id' => $producto->id,
                'cantidad' => 1,
            ]);
        }

        // Redireccionar a la página de carrito o a donde desees después de agregar el producto
        return redirect()->route('carrito.ver')->with('success', 'Producto agregado al carrito correctamente');
    }
    public function eliminarProducto($id)
    {
        // Buscar el producto en el carrito por su ID
        $item = Carrito::findOrFail($id);

        // Eliminar el producto del carrito
        $item->delete();

        // Redireccionar a la página del carrito con un mensaje de éxito
        return redirect()->route('carrito.ver')->with('success', 'Producto eliminado del carrito correctamente.');
    }

    public function comprar(Request $request)
    {
        // Lógica para realizar el proceso de compra
    }


}
