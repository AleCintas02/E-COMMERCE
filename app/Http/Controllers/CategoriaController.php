<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function guardarCategoria(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:50'],
        ]);
    }
}
