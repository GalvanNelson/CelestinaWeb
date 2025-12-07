<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallesPagoOnline extends Model
{        
    protected $fillable = [
        'PedidoID',
        'Fecha',
        'Hora',
        'MetodoPago',
        'Estado'
    ];
}
