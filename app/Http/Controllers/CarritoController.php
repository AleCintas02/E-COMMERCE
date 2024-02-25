<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Services\CarritoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{

    protected $carritoService;
    public function __construct(CarritoService $carritoService)
    {
        $this->carritoService = $carritoService;
    }

    public function verCarrito()
    {
        $datosCarrito = $this->carritoService->verCarrito();
        return view('carrito', $datosCarrito);
    }

    public function agregarProducto(Request $request, $id)
    {
        $this->carritoService->agregarProducto($id);
        return redirect()->route('carrito.ver')->with('success', 'Producto agregado al carrito correctamente');
    }
    public function eliminarProducto($id)
    {
        $this->carritoService->eliminarProducto($id);
        return redirect()->route('carrito.ver')->with('success', 'Producto eliminado del carrito correctamente.');
    }




    public function ingresarDatosEnvio()
    {
        // Puedes agregar lógica adicional aquí si es necesario
        return view('datos_envio');
    }

    public function comprar(Request $request)
    {
        // Obtener los datos del formulario de datos de envío
        $datosEnvio = $request->only(['nombre', 'apellido', 'direccion', 'ciudad', 'codigo_postal']);

        // Obtener el carrito del usuario actual
        $carrito = Carrito::where('user_id', Auth::id())->get();

        // Calcular el total del carrito
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item->producto->precio * $item->cantidad;
        }

        // Redirigir a la página de confirmación de compra con los datos necesarios
        return view('confirmar_compra', compact('carrito', 'total', 'datosEnvio'));
    }

    public function confirmarCompra(Request $request)
    {
        // Obtener los datos del formulario de confirmación de compra
        $datosCompra = $request->only(['nombre', 'apellido', 'direccion', 'ciudad', 'codigo_postal']);

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

        // Redirigir a una página de confirmación o a donde desees
        return redirect()->route('home')->with('success', '¡Compra realizada con éxito!');
    }
}
