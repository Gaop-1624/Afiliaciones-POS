<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ep extends Model
{
    public function afiliados(){
        return $this->hasMany(Afiliado::class, 'id', 'eps_id');
    }
}
