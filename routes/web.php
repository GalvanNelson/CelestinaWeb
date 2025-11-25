<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;

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
    Route::middleware(['check.team:Propietario'])->group(function () {
        Route::resource('dashboard/user', UserController::class);
    });

    // --- RUTAS PARA EL TEAM 'Ventas' ---
    Route::middleware(['check.team:Vendedor'])->group(function () {
        Route::resource('/dashboard/productos', ProductoController::class);
        Route::get('/dashboard/reportes', function () { return 'Reportes de Ventas'; });
    });

    // --- RUTAS PARA EL TEAM 'Soporte' ---
    Route::middleware(['check.team:Soporte'])->group(function () {
        Route::get('/soporte/tickets', function () { return 'Lista de Tickets'; });
    });
});
