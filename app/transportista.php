<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transportista extends Model
{
    public function transportista_x_vehiculo()
    {
        return $this->hasMany('App\transportista_x_vehiculo');
    }
}
