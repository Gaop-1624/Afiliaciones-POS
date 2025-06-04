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
            $table->id();
            $table->string('codigo');
            $table->string('total_pagado');
            $table->date('fecha_pago');
            $table->string('periodo');
            $table->foreignId('afiliado_id')->constrained()->on('afiliados')->nullable();
            $table->foreignId('user_id')->constrained()->on('users')->nullable();
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
