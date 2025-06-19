<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arl extends Model
{
    public function afiliados(){
        return $this->hasMany(Afiliado::class, 'id', 'caja_id');
    }
}
