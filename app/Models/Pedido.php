<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos'; // Asegúrate que coincida con tu tabla
    protected $primaryKey = 'PedidoID';
    public $incrementing = false;
    protected $keyType = 'string';

    // ESTO ES LO NUEVO QUE DEBES AGREGAR:
    protected $fillable = [
        'PedidoID',
        'Fecha',
        'Hora',
        'MetodoPago',
        'Estado'
    ];
}
