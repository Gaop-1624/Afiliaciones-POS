<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $empresa = new Empresa();
        $empresa->nit = "901923262";
        $empresa->dev = "2";
        $empresa->nombre = "INTEGRALES GROUP JG S.A.S";
        $empresa->direccion = "MZ 7 CS 11B CR 17 D 21 23";
        $empresa->telefono = "3217180279";
        $empresa->celular = "3228466724";
        $empresa->email = "integralesgroupjgsas@gmail.com";
        $empresa->ciudad_id = "1037";
        $empresa->t_documento_id  = "3";
        $empresa->Pagina_web  = "www.integralesgroupjgsas.com";
        $empresa->arl_id  = "7";
        $empresa->caja_id  = "1";
        $empresa->save();
    }
}
