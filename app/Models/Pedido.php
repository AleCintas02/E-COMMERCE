<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nombre', 'apellido', 'direccion', 'ciudad', 'codigo_postal'];

    // Definir la relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definir la relación con los detalles del pedido
    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
