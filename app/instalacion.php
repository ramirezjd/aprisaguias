<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class instalacion extends Model
{
    protected $table = "instalaciones";
    public function usuarios_x_instalacion()
    {
        return $this->hasMany('App\usuarios_x_instalacion');
    }

    public function subordinados()
    {
        return $this->hasMany('App\instalacion');
    }

    public function superior()
    {
        return $this->belongsTo('App\instalacion');
    }

    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }

    public function tipo_instalacion()
    {
        return $this->belongsTo('App\tipo_instalacion');
    }

    public function instalacion_remitente()
    {
        return $this->belongsTo('App\remesa');
    }

    public function instalacion_destinatario()
    {
        return $this->belongsTo('App\remesa');
    }

    public function instalacion_guia_remitente()
    {
        return $this->belongsTo('App\guia');
    }

    public function instalacion_guia_destinatario()
    {
        return $this->belongsTo('App\guia');
    }

    public function instalacion_guia_actual()
    {
        return $this->belongsTo('App\guia');
    }

}
