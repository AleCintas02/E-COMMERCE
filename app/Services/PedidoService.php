<?php

namespace App\Services;

use App\Models\DetallePedido;
use App\Models\Pedido;

class PedidoService
{

    public function listarPedidos()
    {
        $pedidos = Pedido::all();
        
        return view('opciones.admin-pedidos', compact('pedidos'));
    }
    
    public function obtenerDetallesPedido($id)
    {

    }
}
