<?php

namespace App\Services;

use App\Models\DetallePedido;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoService
{

    public function listarPedidos()
    {
        $pedidos = Pedido::all();

        return view('opciones.admin-pedidos', compact('pedidos'));
    }

    public function obtenerMisPedidos()
    {
        $userId = Auth::id();

        // Obtener los pedidos asociados a ese usuario
        $pedidos = Pedido::where('user_id', $userId)->get();

        // Obtener los detalles de los pedidos asociados a esos pedidos
        foreach ($pedidos as $pedido) {
            $pedido->detalles = DetallePedido::where('pedido_id', $pedido->id)->get();
        }

        return $pedidos;
    }

    public function obtenerDetallesPedido($idPedido)
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

        return [
            'pedido' => $pedido,
            'detalles' => $detalles,
            'totalPagado' => $totalPagado,
        ];
    }

    public function obtenerDetallePedido($idPedido)
    {
        // Obtener los detalles del pedido con las cantidades pagadas
        $detallesPedido = DetallePedido::where('pedido_id', $idPedido)->get();

        // Calcular el total pagado
        $totalPagado = $detallesPedido->sum('cantidad_pagada');

        return [
            'detallesPedido' => $detallesPedido,
            'totalPagado' => $totalPagado,
        ];
    }

    public function obtenerDetalleMiPedido($idPedido)
    {
        // Obtener los detalles del pedido con las cantidades pagadas
        $detallesPedido = DetallePedido::where('pedido_id', $idPedido)->get();

        // Calcular el total pagado
        $totalPagado = $detallesPedido->sum('cantidad_pagada');

        return [
            'detallesPedido' => $detallesPedido,
            'totalPagado' => $totalPagado,
        ];
    }

    public function cambiarEstadoPedido($idPedido)
    {
        $pedido = Pedido::findOrFail($idPedido);
        $pedido->estado = $pedido->estado == 'S' ? 'N' : 'S';
        $pedido->save();

        return [
            'success' => true,
            'estado' => $pedido->estado
        ];
    }

    public function filtrarPedidos($estado)
    {
        if ($estado == 'entregados') {
            $pedidos = Pedido::where('estado', 'S')->get();
        } elseif ($estado == 'pendientes') {
            $pedidos = Pedido::where('estado', 'N')->get();
        } else {
            $pedidos = Pedido::all();
        }

        return $pedidos;
    }
}
