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
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tdocumento')->constrained()->on('t_documentos');
            $table->string('documento', 20);
            $table->string('nombre', 100);
            $table->string('direccion', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('celular', 20);
            $table->string('email', 100)->nullable();
            $table->date('fecha_nac')->nullable();
            $table->integer('sexo')->nullable();
            $table->double('salario');
            $table->double('riesgo', 20);
            $table->integer('status')->default(0);//0 Ingreso 1 Activo 2 Retirado
            $table->foreignId('ciudad_id')->constrained()->on('ciudads')->nullable();
            $table->foreignId('eps_id')->constrained()->on('eps')->nullable();
            $table->foreignId('afp_id')->constrained()->on('afps')->nullable();
            $table->foreignId('user_id')->constrained()->on('users')->nullable();
            $table->foreignId('caja_id')->constrained()->on('cajas')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliados');
    }
};
