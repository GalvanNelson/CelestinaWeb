<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // 1. Definir la llave primaria personalizada
    protected $primaryKey = 'codigo_producto';

    // 2. Permitir asignación masiva para tus campos
    protected $fillable = [
        'nombre_producto',
        'imagen',
        'precio_unitario',
        'categoria',
        'unidad_medida',
        'vendedor',
        // 'team_id' // Descomenta esto si los productos pertenecen a un equipo
    ];
}
