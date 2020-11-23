<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vehiculo extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'codigo',
        'placa',
        'status',
    ];
    public function remesa()
    {
        return $this->hasMany('App\remesa');
    }

    public function transportista_x_vehiculo()
    {
        return $this->hasMany('App\transportista_x_vehiculo');
    }
}
