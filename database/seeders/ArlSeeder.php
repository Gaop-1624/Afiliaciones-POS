<?php

namespace Database\Seeders;

use App\Models\Arl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $afp1 = new Arl();
        $afp1->nit ="860002183";  
        $afp1->codigo ="14-4";
        $afp1->nombre ="A.R.L. Seguros de Vida Colpatria S.A.";
        $afp1 ->save();

        
        $afp2 = new Arl();
        $afp2->nit ="860002503";  
        $afp2->codigo ="14-7";
        $afp2->nombre ="Compañía de Seguros Bolívar S.A.";
        $afp2 ->save();

        
        $afp3 = new Arl();
        $afp3->nit ="860022137";  
        $afp3->codigo ="14-8";
        $afp3->nombre ="Seguros de Vida Aurora";
        $afp3 ->save();

        
        $afp4 = new Arl();
        $afp4->nit ="860503617";  
        $afp4->codigo ="14-17";
        $afp4->nombre ="ARP Alfa";
        $afp4 ->save();

        
        $afp5 = new Arl();
        $afp5->nit ="860008645";  
        $afp5->codigo ="14-18";
        $afp5->nombre ="Liberty Seguros de Vida S.A.";
        $afp5 ->save();

        
        $afp6 = new Arl();
        $afp6->nit ="860011153";  
        $afp6->codigo ="14-23";
        $afp6->nombre ="Positiva Compañía de Seguros";
        $afp6 ->save();

        
        $afp7 = new Arl();
        $afp7->nit ="800226175";  
        $afp7->codigo ="14-25";
        $afp7->nombre ="Colmena Riesgos Profesionales";
        $afp7 ->save();

        
        $afp8 = new Arl();
        $afp8->nit ="800256161";  
        $afp8->codigo ="14-28";
        $afp8->nombre ="ARL Sura";
        $afp8 ->save();

        
        $afp9 = new Arl();
        $afp9->nit ="830008686";  
        $afp9->codigo ="14-29";
        $afp9->nombre ="La Equidad Seguros de Vida";
        $afp9 ->save();

        
        $afp10 = new Arl();
        $afp10->nit ="830054904";  
        $afp10->codigo ="14-30";
        $afp10->nombre ="Mapfre Colombia Vida Seguros S.A";
        $afp10 ->save();
    }
}
