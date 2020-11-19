<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class paquete extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'peso',
        'dim_ancho',
        'dim_alto',
        'dim_fondo',
        'descripcion',
        'tipo_paquete_id',
        'guia_id',
        'peso_volumetrico',
    ];

    public function guia()
    {
        return $this->belongsTo('App\guia');
    }

    public function paquetes_x_guia()
    {
        return $this->hasMany('App\paquetes_x_guia');
    }

    public function tipo_paquete()
    {
        return $this->belongsTo('App\tipo_paquete');
    }
}
