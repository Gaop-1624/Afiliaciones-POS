<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $table = 'afiliados';
    
    protected $fillable = [
        'nombre', 'documento',
        'direccion', 'telefono', 
        'celular', 'email', 
        'ciudad_id', 'tdocumento',
        'eps_id', 'arl_id',
        'afp_id', 'caja_id',
        'riesgo', 'estado', 'salario',
        'fecha_nac', 'sexo', 'user_id'
    ];

    //Relacion uno a uno con la tabla tipo documento
    public function tdocumentos(){
        return $this->belongsTo(TDocumentos::class, 'tdocumento', 'id');
    }

    //Relacion uno a uno con la tabla Eps
    public function eps(){
        return $this->belongsTo(Ep::class, 'eps_id', 'id');
    }

    //Relacion uno a uno con la tabla Caja
    public function cajas(){
        return $this->belongsTo(Caja::class, 'caja_id', 'id');
    }

    //Relacion uno a uno con la tabla afp
    public function afp(){
        return $this->belongsTo(Afp::class);
    }

    //Relacion uno a uno con la tabla caja
     public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }

     //Relacion uno a muchos con el usuario
    public function users(){
        return $this->hasMany(User::class, 'user_id');
    } 

    //Relacion uno a muchos con el prestamo
    public function pagos(){
        return $this->hasMany(Pago::class, 'afiliado_id');
    } 

    //Relacion uno a uno con la tabla salario 
    public function salario(){
        return $this->belongsTo(Salario::class, 'afiliado_id');
    }

 
}
