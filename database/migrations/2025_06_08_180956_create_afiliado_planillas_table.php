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
        Schema::create('afiliado_planillas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planilla_id')->constrained()->on('planillas')->nullable();
            $table->foreignId('afiliado_id')->constrained()->on('afiliados')->nullable();
            $table->foreignId('eps_id')->constrained()->on('eps')->nullable();
            $table->foreignId('afp_id')->constrained()->on('afps')->nullable();
            $table->foreignId('caja_id')->constrained()->on('cajas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliado_planillas');
    }
};
