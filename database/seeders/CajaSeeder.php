<?php

namespace Database\Seeders;

use App\Models\Caja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caja1 = new Caja();
        $caja1->nit ="890303093";  
        $caja1->codigo ="CCF56";
        $caja1->nombre ="Comfenalco Valle";
        $caja1 ->save();

        $caja2 = new Caja();
        $caja2->nit ="890303208";  
        $caja2->codigo ="CCF57";
        $caja2->nombre ="Comfandi ";
        $caja2 ->save();

        $caja3 = new Caja();
        $caja3->nit ="000000000";  
        $caja3->codigo ="CC000";
        $caja3->nombre ="Sin Caja";
        $caja3->save();
    }
}
