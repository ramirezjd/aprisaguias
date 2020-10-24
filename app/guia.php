<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guia extends Model
{
    protected $fillable = [
        'codigo', 
        'peso', 
        'dimensiones', 
        'precio', 
        'fecha_entrega',
        'direccion_destino',
        'punto_referencia_destino'
    ];
}
