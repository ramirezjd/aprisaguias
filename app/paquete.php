<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paquete extends Model
{
    public function paquetes_x_guia()
    {
        return $this->hasMany('App\paquetes_x_guia');
    }

    public function tipo_paquete()
    {
        return $this->belongsTo('App\tipo_paquete');
    }
}
