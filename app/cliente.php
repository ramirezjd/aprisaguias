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
        'nombre_razonsocial',
        'email',
        'telefono',
        'direccion_id'
    ];

    public function direccion()
    {
        return $this->belongsTo('App\direccion');
    }

    public function guias()
    {
        return $this->belongsTo('App\guia');
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
