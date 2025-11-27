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
        Schema::create('callbacks', function (Blueprint $table) {
            $table->id("PedidoID")->primary();
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
        Schema::dropIfExists('callbacks');
    }
};
