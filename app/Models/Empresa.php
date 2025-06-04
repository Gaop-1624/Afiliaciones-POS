<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'nombre', 'nit', 'direccion', 'telefono', 
        'celular', 'email', 'ciudad_id', 't_documento_id', 
        'Pagina_web', 'dev', 'tenant_id', 'arl_id', 'caja_id'
    ];

    //Relacion uno a uno con la tabla tipo documento
     public function tipodocumento(){
        return $this->belongsTo(TDocumentos::class);
    }

    //Relacion uno a uno con la tabla tipo documento
    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }

    //Relacion uno a muchos con el usuario
     public function users(){
        return $this->hasMany(User::class, 'id', 'empresa_id');
    } 
}
