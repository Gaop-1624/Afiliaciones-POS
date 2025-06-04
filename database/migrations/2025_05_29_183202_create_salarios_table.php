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
        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->double('nombre');
            $table->string('año');
            $table->double('administracion');
            $table->foreignId('afiliado_id')->constrained()->on('afiliados')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salarios');
    }
};
