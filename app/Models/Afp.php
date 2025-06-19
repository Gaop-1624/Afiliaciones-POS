<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afp extends Model
{
    public function afiliados(){
        return $this->hasMany(Afiliado::class, 'id', 'caja_id');
    }
}
