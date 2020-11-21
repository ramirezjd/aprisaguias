<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class remesa extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'codigo',
        'origen',
        'destino',
        'peso_volumetrico_total',
        'volumen_total',
        'peso_total',
        'vehiculo_id',
        'transportista_id',
    ];
    public function guias_x_remesa()
    {
        return $this->hasMany('App\guias_x_remesa');
    }

    public function instalacion_remitente()
    {
        return $this->hasOne('App\instalacion');
    }

    public function instalacion_destinatario()
    {
        return $this->hasOne('App\instalacion');
    }

    public function vehiculo()
    {
        return $this->belongsTo('App\vehiculo');
    }

    public function transportista()
    {
        return $this->belongsTo('App\transportista');
    }
}
