<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
     public function afiliados(){
        return $this->hasMany(Afiliado::class, 'id', 'caja_id');
    }
}
