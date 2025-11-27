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
        Schema::create('detalle_ventas', function (Blueprint $table) {           
            $table->id('codigo_detalle_venta');            
            $table->integer('cantidad_producto')->nullable();
            $table->decimal('precio_unitario', 10, 2)->nullable();            
            $table->decimal('subtotal', 10, 2)->nullable();            
            $table->unsignedBigInteger('venta_contado')->nullable();            
            $table->unsignedBigInteger('producto')->nullable();
            $table->unsignedBigInteger('venta_credito')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
