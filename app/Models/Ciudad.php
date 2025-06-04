<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
       //Relacion uno a uno con la tabla empresa 
    public function empresa(){
        return $this->hasMany(Empresa::class);
    }
}

