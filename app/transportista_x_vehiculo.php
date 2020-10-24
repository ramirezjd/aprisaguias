<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transportista_x_vehiculo extends Model
{
    public function transportista()
    {
        return $this->belongsTo('App\transportista');
    }

    public function vehiculo()
    {
        return $this->belongsTo('App\vehiculo');
    }
}
