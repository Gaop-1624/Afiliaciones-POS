<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    protected $table = 'gastos';
    
    protected $fillable = [
        'detalle', 
        'total_gasto',  
        'fecha_pago', 
        'empresa_id',
        'user_id',
        'afiliado_id'
    ];
    
}
