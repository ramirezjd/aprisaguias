<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class transportista extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombres',
        'apellidos',
        'telefono',
        'direccion',
        'status',
    ];
    public function transportista_x_vehiculo()
    {
        return $this->hasMany('App\transportista_x_vehiculo');
    }

    public function remesas()
    {
        return $this->hasMany('App\remesa');
    }
}
