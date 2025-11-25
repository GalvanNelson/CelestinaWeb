<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Inertia\Inertia;

class ShopController extends Controller
{
    public function index()
    {
        // Traemos los productos.
        // Opcional: Podrías agregar ->where('stock', '>', 0) más adelante.
        $productos = Producto::all();

        return Inertia::render('Shop/Index', [
            'productos' => $productos
        ]);
    }
    
    // Opcional: Ver detalle de un solo producto
    public function show(Producto $producto)
    {
        return Inertia::render('Shop/Show', [
            'producto' => $producto
        ]);
    }
}