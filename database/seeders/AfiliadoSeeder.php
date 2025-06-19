<?php

namespace Database\Seeders;

use App\Models\Afiliado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AfiliadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $afiliado1 = new Afiliado();
        $afiliado1->tdocumento = "1";
        $afiliado1->documento = "6319620";
        $afiliado1->nombre = "German Alberto Ortiz";
        $afiliado1->direccion = "Calle 4 n 7-67";
        $afiliado1->telefono = "8881942";
        $afiliado1->celular = "3228466724";
        $afiliado1->email = 'kronos1624@yahoo.es';
        $afiliado1->fecha_nac = "1973-03-08";
      //  $afiliado1->salario = "1423500";
        $afiliado1->sexo = "1";
        $afiliado1->riesgo = "0.0435";
        $afiliado1->ciudad_id = "1";
        $afiliado1->eps_id = "15";
        $afiliado1->afp_id = "2";
        $afiliado1->user_id = "1";
        $afiliado1->caja_id = "1";
        $afiliado1->save();
    }
}
