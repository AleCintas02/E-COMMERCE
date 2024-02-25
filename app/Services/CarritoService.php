<?php

namespace App\Services;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarritoService
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

        return ['carrito' => $carrito, 'total' => $total];
    }
    public function agregarProducto($productoId)
    {
        $user = Auth::user();
        $producto = Producto::findOrFail($productoId);

        $carrito = Carrito::where('user_id', $user->id)
            ->where('producto_id', $producto->id)
            ->first();

        if ($carrito) {
            $carrito->cantidad += 1;
            $carrito->save();
        } else {
            Carrito::create([
                'user_id' => $user->id,
                'producto_id' => $producto->id,
                'cantidad' => 1,
            ]);
        }
    }

    public function eliminarProducto($id)
    {
        $carritoItem = Carrito::findOrFail($id);
        $carritoItem->delete();
    }

    
}
