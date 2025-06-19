<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AfiliadoPlanilla extends Model
{
   protected $table = 'afiliado_planillas';

    protected $fillable = [
            'planilla_id',
            'afiliado_id',
            'user_id',
            'eps_id',
            'afp_id',
            'caja_id'
    ];

}
