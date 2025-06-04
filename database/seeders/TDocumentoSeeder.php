<?php

namespace Database\Seeders;

use App\Models\TDocumentos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $TDocuemnto1 = new TDocumentos();
        $TDocuemnto1->nombre = "Cedula de Ciudania";
        $TDocuemnto1->save();
  
        $TDocuemnto2 = new TDocumentos();
        $TDocuemnto2->nombre = "Cedula de Extranjeria";
        $TDocuemnto2->save();

        $TDocuemnto3 = new TDocumentos();
        $TDocuemnto3->nombre = "Numero Identificacion Tributaria";
        $TDocuemnto3->save();
  
        $TDocuemnto4 = new TDocumentos();
        $TDocuemnto4->nombre = "Tarjeta de Identidad";
        $TDocuemnto4->save();
  
        $TDocuemnto5 = new TDocumentos();
        $TDocuemnto5->nombre = "Rejistro Civil";
        $TDocuemnto5->save();
  
        $TDocuemnto6 = new TDocumentos();
        $TDocuemnto6->nombre = "Pasaporte";
        $TDocuemnto6->save();
  
        $TDocuemnto7 = new TDocumentos();
        $TDocuemnto7->nombre = "Carnet Diplomatico ";
        $TDocuemnto7->save();
  
        $TDocuemnto8 = new TDocumentos();
        $TDocuemnto8->nombre = "Salvoconducto de Permanencia";
        $TDocuemnto8->save();
  
        $TDocuemnto9 = new TDocumentos();
        $TDocuemnto9->nombre = "Permiso de Proteccion Temporal";
        $TDocuemnto9->save();
  
        $TDocuemnto10 = new TDocumentos();
        $TDocuemnto10->nombre = "Permiso Especial de Permanencia";
        $TDocuemnto10->save();
    }
}
