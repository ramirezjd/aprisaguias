<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cliente extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombre-razonsocial',
        'email',
        'telefono',
        'direccion_id'
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
