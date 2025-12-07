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
        Schema::create('detalles_pago_onlines', function (Blueprint $table) {
            $table->id('codigo_detalles_pago_online');
            $table->integer('venta');            
            $table->string('PedidoID');
            $table->date("Fecha");        
            $table->time("Hora");    
            $table->string("MetodoPago");
            $table->string("Estado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_pago_onlines');
    }
};
