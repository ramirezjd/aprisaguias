<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class remesa extends Model
{
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
}
