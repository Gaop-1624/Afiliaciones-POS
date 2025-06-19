<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table = 'salarios';

     protected $fillable = [
        'salario',
        'año',
        'administracion',
        'afiliado_id'
     ];

     //Relacion uno a uno con la tabla salario
     public function afiliado(){
        return $this->hasOne(Afiliado::class, 'afiliado_id');
    }
}
