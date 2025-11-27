<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Pedido;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --- NUEVA RUTA CALLBACK ---
Route::post('/callbackUrl', function (Request $request) {
    
    // 1. Validar datos
    $validated = $request->validate([
        'PedidoID'   => 'required',
        'Fecha'      => 'required',
        'Hora'       => 'required',
        'MetodoPago' => 'required',
        'Estado'     => 'required',
    ]);

    try {
        // 2. Guardar o Actualizar en la Base de Datos
        // El primer array es la condición de búsqueda (Buscar por PedidoID)
        // El segundo array son los datos que se guardarán o actualizarán
        $pedido = Pedido::updateOrCreate(
            ['PedidoID' => $request->input('PedidoID')], 
            [
                'Fecha'      => $request->input('Fecha'),
                'Hora'       => $request->input('Hora'),
                'MetodoPago' => $request->input('MetodoPago'),
                'Estado'     => $request->input('Estado')
            ]
        );

        // 3. Retornar respuesta exitosa
        return response()->json([
            "error"   => 0,
            "status"  => 1,
            "message" => "Pago registrado correctamente",
            "values"  => true
        ]);

    } catch (\Exception $e) {
        // En caso de error (ej. base de datos caída), retornar error pero en JSON
        return response()->json([
            "error"   => 1,
            "status"  => 0,
            "message" => "Error al guardar en BD: " . $e->getMessage(),
            "values"  => false
        ], 500);
    }
});