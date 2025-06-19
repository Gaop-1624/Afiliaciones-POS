<?php

namespace Database\Seeders;

use App\Models\Salario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $salario1 = new Salario();
        $salario1->salario = "1423500";
        $salario1->año = "2025";
        $salario1->afiliado_id = "1";
        $salario1->save();
    }
}
