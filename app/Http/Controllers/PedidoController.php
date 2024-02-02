<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function procesarPago()
    {
        return view('direccion-envio');
    }

    public function guardarDireccion(Request $request)
    {
        // Validar los datos del formulario de dirección
        $request->validate([
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            // Agrega más reglas de validación según sea necesario
        ]);

        // Guardar los datos de dirección en la sesión para usarlos más tarde
        Session::put('direccion_envio', $request->only(['direccion', 'ciudad']));

        return redirect()->route('carrito.confirmar-compra');
    }

    public function confirmarCompra()
    {
        // Obtener los datos del carrito y el total
        $carrito = Carrito::where('user_id', Auth::id())->get();
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item->producto->precio * $item->cantidad;
        }

        // Obtener los datos de dirección de envío de la sesión
        $direccionEnvio = Session::get('direccion_envio');

        return view('confirmar-compra', compact('carrito', 'total', 'direccionEnvio'));
    }
}
