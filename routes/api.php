<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --- NUEVA RUTA CALLBACK ---
Route::post('/callbackUrl', function (Request $request) {
    
    // 1. (Opcional) Validar que lleguen los datos esperados
    // Esto asegura que el JSON tenga la estructura correcta antes de procesar
    $request->validate([
        'PedidoID'   => 'required',
        'Fecha'      => 'required',
        'Hora'       => 'required',
        'MetodoPago' => 'required',
        'Estado'     => 'required',
    ]);

    // 2. Aquí puedes capturar los datos para usarlos (ej: guardar en BD)
    // $pedidoId = $request->input('PedidoID');
    // $nuevoEstado = $request->input('Estado');
    // Log::info('Pago recibido: ' . $pedidoId); 

    // 3. Retornar la respuesta JSON con el formato solicitado
    return response()->json([
        "error"   => 0,
        "status"  => 1,
        "message" => "Recepcion de datos exitosa", // Puedes personalizar este mensaje
        "values"  => true
    ]);
});