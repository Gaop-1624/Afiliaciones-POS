<?php

namespace Database\Seeders;

use App\Models\Afp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AfpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $afp1 = new Afp();
        $afp1->nit ="800229739";  
        $afp1->codigo ="230201";
        $afp1->nombre ="Protección";
        $afp1 ->save();

        
        $afp2 = new Afp();
        $afp2->nit ="800224808";  
        $afp2->codigo ="230301";
        $afp2->nombre ="Porvenir";
        $afp2 ->save();

        
        $afp3 = new Afp();
        $afp3->nit ="800253055";  
        $afp3->codigo ="230901";
        $afp3->nombre ="Old Mutual Fondo de Pensiones Obligatorias";
        $afp3 ->save();

        
        $afp4 = new Afp();
        $afp4->nit ="830125132";  
        $afp4->codigo ="230904";
        $afp4->nombre ="Old Mutual Fondo Alternativo de Pensiones";
        $afp4 ->save();

        
        $afp5 = new Afp();
        $afp5->nit ="800227940";  
        $afp5->codigo ="231001";
        $afp5->nombre ="Colfondos";
        $afp5 ->save();

        
        $afp6 = new Afp();
        $afp6->nit ="860007379";  
        $afp6->codigo ="25-2";
        $afp6->nombre ="Caja de Auxilios y de Prestaciones de ACDAC";
        $afp6 ->save();

        
        $afp7 = new Afp();
        $afp7->nit ="899999734";  
        $afp7->codigo ="25-3";
        $afp7->nombre ="Fondo de Previsión Social del Congreso";
        $afp7 ->save();

        
        $afp8 = new Afp();
        $afp8->nit ="800216278";  
        $afp8->codigo ="25-7";
        $afp8->nombre ="Pensiones de Antioquia";
        $afp8 ->save();

        
        $afp9 = new Afp();
        $afp9->nit ="900336004";  
        $afp9->codigo ="25-14";
        $afp9->nombre ="Administradora Colombiana de Pensiones Colpensiones";
        $afp9 ->save();

        $afp10 = new Afp();
        $afp10->nit ="000000000";  
        $afp10->codigo ="00-00";
        $afp10->nombre ="Sin Pensión";
        $afp10 ->save();
    }
}
