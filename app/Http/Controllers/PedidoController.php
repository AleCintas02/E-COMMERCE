<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Services\PedidoService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    protected $pedidoService;
    public function __construct(PedidoService $pedidoService)
    {
        $this->pedidoService = $pedidoService;
    }

    public function index()
    {
        $pedidos = $this->pedidoService->listarPedidos();

        return $pedidos;
    }

    public function misPedidos()
    {
        // Obtener el ID del usuario en sesión
        $userId = Auth::id();

        // Obtener los pedidos asociados a ese usuario
        $pedidos = Pedido::where('user_id', $userId)->get();

        // Obtener los detalles de los pedidos asociados a esos pedidos
        foreach ($pedidos as $pedido) {
            $pedido->detalles = DetallePedido::where('pedido_id', $pedido->id)->get();
        }

        return view('opciones.mis-pedidos', compact('pedidos'));
    }

    public function mostrarDetallesPedido($idPedido)
    {
        // Obtener el pedido
        $pedido = Pedido::findOrFail($idPedido);

        // Obtener los detalles del pedido con las cantidades pagadas
        $detalles = DB::table('detalle_pedidos')
            ->select('nombre_producto', 'cantidad', 'cantidad_pagada')
            ->where('pedido_id', $idPedido)
            ->get();

        // Calcular el total pagado
        $totalPagado = $detalles->sum('cantidad_pagada');

        // Pasar los datos a la vista
        return view('opciones.admin-pedidos', [
            'pedido' => $pedido,
            'detalles' => $detalles,
            'totalPagado' => $totalPagado,
        ]);
    }
    public function detallePedido($id)
    {
        $detallesPedido = DetallePedido::where('pedido_id', $id)->get();
        $totalPagado = $detallesPedido->sum('cantidad_pagada');
        return view('detalles-pedido', compact('detallesPedido', 'totalPagado'));
    }
    public function detalleMiPedido($id)
    {
        $detallesPedido = DetallePedido::where('pedido_id', $id)->get();
        $totalPagado = $detallesPedido->sum('cantidad_pagada');
        return view('opciones.mi_pedido', compact('detallesPedido', 'totalPagado'));
    }

    public function cambiarEstadoPedido($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->estado = $pedido->estado == 'S' ? 'N' : 'S';
        $pedido->save();

        return response()->json(['success' => true, 'estado' => $pedido->estado]);
    }
    public function filtrarPedidos(Request $request)
    {
        $estado = $request->input('estado');

        if ($estado == 'entregados') {
            $pedidos = Pedido::where('estado', 'S')->get();
        } elseif ($estado == 'pendientes') {
            $pedidos = Pedido::where('estado', 'N')->get();
        } else {
            $pedidos = Pedido::all();
        }

        return view('opciones.admin-pedidos', compact('pedidos'));
    }
}
