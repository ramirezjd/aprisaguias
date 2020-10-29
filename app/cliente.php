<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    
    protected $fillable = [
        'tip_documento',
        'document',
        'nombre-razonsocial',
        'email',
        'telefono'
    ];

    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }

    public function remitente()
    {
        return $this->belongsT('App\cliente');
    }

    public function destinatario()
    {
        return $this->belongsTo('App\cliente');
    }

    public function instalacion()
    {
        return $this->belongsTo('App\instalacion');
    }
}
