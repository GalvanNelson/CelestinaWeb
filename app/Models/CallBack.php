<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallBack extends Model
{   
    protected $table = 'callbacks'; 
    protected $primaryKey = 'PedidoID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'PedidoID',
        'Fecha',
        'Hora',
        'MetodoPago',
        'Estado'
    ];
}
