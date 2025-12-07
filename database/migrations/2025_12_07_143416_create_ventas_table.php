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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('codigo_venta');
            $table->integer('cliente');
            $table->date('fecha_venta');
            $table->decimal('monto_total', 10, 2);
            $table->enum('tipo_pago', ['contado', 'credito'])->default('contado');
            $table->enum('estado_venta', ['pendiente', 'pagado', 'vencido'])->default('pendiente');
            $table->decimal('interes_aplicado', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
