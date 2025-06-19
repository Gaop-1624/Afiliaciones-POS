<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    protected $table = 'planillas';

    protected $fillable = [
            'nplanilla',
            'total_pagado',
            'periodo_salud',
            'periodo_pension',
            'user_id',
    ];

    //Relacion uno a muchos con el plan
     public function afiliadoplanillas(){
        return $this->hasMany(AfiliadoPlanilla::class);
    } 
}
