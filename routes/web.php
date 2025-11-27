<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    //Route::resource('dashboard/user', UserController::class);

    // --- RUTAS PARA EL TEAM 'Administradores' ---
    // Solo entra si el usuario tiene seleccionado el equipo 'Propietario'
    Route::middleware(['check.team:propietario'])->group(function () {
        Route::resource('dashboard/user', UserController::class);
    });

    // --- RUTAS PARA EL TEAM 'Ventas' ---
    Route::middleware(['check.team:vendedor'])->group(function () {
        Route::resource('/dashboard/productos', ProductoController::class);
        Route::get('/dashboard/reportes', function () { return 'Reportes de Ventas'; });
    });

    // --- RUTAS PARA EL TEAM 'Cliente' ---
    Route::middleware(['check.team:cliente'])->group(function () {
        // Ruta principal del catálogo
        Route::get('/dashboard/catalogo', [ShopController::class, 'index'])->name('shop.index');

        // (Opcional) Ruta para ver detalle de un producto
        Route::get('/dashboard/catalogo/{producto}', [ShopController::class, 'show'])->name('shop.show');

        Route::get('/dashboard/tickets', function () { return 'Lista de Tickets'; });
    });
});
