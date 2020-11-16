<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paquete extends Model
{
    protected $fillable = [
        'peso',
        'dim_ancho',
        'dim_alto',
        'dim_fondo',
        'descripcion',
        'tipo_paquete_id',
        'guia_id',
    ];

    public function paquetes_x_guia()
    {
        return $this->hasMany('App\paquetes_x_guia');
    }

    public function tipo_paquete()
    {
        return $this->belongsTo('App\tipo_paquete');
    }
}
