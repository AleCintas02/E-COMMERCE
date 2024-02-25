<?php

namespace App\Http\Controllers;

use App\Services\CompraService;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    protected $compraService;
    public function __construct(CompraService $compraService)
    {
        $this->compraService = $compraService;
    }

    public function ingresarDatosEnvio()
    {
        return $this->compraService->ingresarDatosEnvio();
    }

    public function confirmarCompra(Request $request)
    {
        // Obtener los datos del formulario de confirmación de compra
        $datosCompra = $request->only(['nombre', 'apellido', 'direccion', 'ciudad', 'codigo_postal']);

        // Procesar la compra usando el servicio
        $pedidoId = $this->compraService->procesarCompra($datosCompra);

        // Redirigir a una página de confirmación o a donde desees, pasando el ID del pedido
        return redirect()->route('home')->with('success_compra');
    }
}
