<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

    protected $fillable = [
            'codigo',
            'afiliado_id',
            'total_pagado',
            'fecha_pago',
            'user_id',
            'periodo',
            'nplanilla'
    ];

   //Relacion uno a muchos con la tabla afiliado
    public function afiliado(){
        return $this->belongsTo(Afiliado::class, 'afiliado_id');
    }
}
