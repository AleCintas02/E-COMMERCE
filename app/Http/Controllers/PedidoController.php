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
        $pedidos = $this->pedidoService->obtenerMisPedidos();

        return view('opciones.mis-pedidos', compact('pedidos'));
    }

    public function mostrarDetallesPedido($idPedido)
    {
        $datosPedido = $this->pedidoService->obtenerDetallesPedido($idPedido);

        return view('opciones.admin-pedidos', $datosPedido);
    }
    public function detallePedido($id)
    {
        $datosPedido = $this->pedidoService->obtenerDetallePedido($id);

        return view('detalles-pedido', $datosPedido);
    }
    public function detalleMiPedido($id)
    {
        $datosPedido = $this->pedidoService->obtenerDetalleMiPedido($id);

        return view('opciones.mi_pedido', $datosPedido);
    }

    public function cambiarEstadoPedido($id)
    {
        $respuesta = $this->pedidoService->cambiarEstadoPedido($id);
        
        return response()->json($respuesta);
    }
    public function filtrarPedidos(Request $request)
    {
        $estado = $request->input('estado');
        $pedidos = $this->pedidoService->filtrarPedidos($estado);

        return view('opciones.admin-pedidos', compact('pedidos'));
    }
}
