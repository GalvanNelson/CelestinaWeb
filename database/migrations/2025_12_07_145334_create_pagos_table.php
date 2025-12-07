<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('codigo_pago');
            $table->string('venta');
            $table->integer('cuota');
            $table->date('fecha_pago');
            $table->decimal('monto_pagado', 10, 2);
            $table->enum('metodo_pago', ['efectivo', 'QR'])->default('efectivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
