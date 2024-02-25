<?php

namespace App\Services;

use App\Models\Carrito;
use App\Models\DetallePedido;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class CompraService
{
    public function ingresarDatosEnvio()
    {
        // Puedes agregar lógica adicional aquí si es necesario
        return view('datos_envio');
    }

    public function procesarCompra($datosCompra)
    {
        // Guardar los datos de la compra en la tabla 'pedidos' por ejemplo
        $pedido = Pedido::create([
            'user_id' => Auth::id(),
            'nombre' => $datosCompra['nombre'],
            'apellido' => $datosCompra['apellido'],
            'direccion' => $datosCompra['direccion'],
            'ciudad' => $datosCompra['ciudad'],
            'codigo_postal' => $datosCompra['codigo_postal'],
            // Puedes agregar más campos según tus necesidades
        ]);

        // Obtener los productos en el carrito del usuario
        $productosCarrito = Carrito::where('user_id', Auth::id())->get();

        // Mover los productos del carrito al pedido
        foreach ($productosCarrito as $productoCarrito) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $productoCarrito->producto_id,
                'nombre_producto' => $productoCarrito->producto->nombre, // Agregar el nombre del producto
                'cantidad' => $productoCarrito->cantidad,
                'cantidad_pagada' => $productoCarrito->producto->precio * $productoCarrito->cantidad, // Calcular la cantidad pagada
                // Puedes agregar más campos según tus necesidades
            ]);
        }

        // Eliminar los productos del carrito después de realizar la compra
        Carrito::where('user_id', Auth::id())->delete();

        // Retornar el ID del pedido creado
        return $pedido->id;
    }
}