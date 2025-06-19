<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TDocumentos extends Model
{
    //Relacion uno a uno con la tabla empresa 
    public function empresa(){
        return $this->hasMany(Empresa::class);
    }

    public function afiliado(){
        return $this->hasMany(Afiliado::class, 'afiliado_id');
    }
}
