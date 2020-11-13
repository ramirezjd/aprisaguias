<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guia extends Model
{
    protected $fillable = [
        'codigo',
        'asegurado',
        'precio',
        'fecha_creacion',
        'fecha_entrega',
        'user_id',
        'cliente_remitente_id',
        'cliente_destinatario_id',
        'instalacion_origen_id',
        'instalacion_destino_id',
        'tipo_destino_id',
        'tipo_pago_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tipo_destino()
    {
        return $this->belongsTo('App\tipo_destino');
    }

    public function tipo_pago()
    {
        return $this->belongsTo('App\tipo_pago');
    }

    public function paquetes_x_guia()
    {
        return $this->hasMany('App\paquetes_x_guia');
    }

    public function guias_x_remesa()
    {
        return $this->hasMany('App\guias_x_remesa');
    }

    public function remitente()
    {
        return $this->hasOne('App\User');
    }

    public function destinatario()
    {
        return $this->hasOne('App\User');
    }

    public function instalacion_guia_remitente()
    {
        return $this->hasOne('App\instalacion');
    }

    public function instalacion_guia_destinatario()
    {
        return $this->hasOne('App\instalacion');
    }

    public function instalacion_guia_actual()
    {
        return $this->hasOne('App\instalacion');
    }
}
