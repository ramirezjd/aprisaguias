<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    public function remesa()
    {
        return $this->hasOne('App\remesa');
    }

    public function transportista_x_vehiculo()
    {
        return $this->hasMany('App\transportista_x_vehiculo');
    }
}
