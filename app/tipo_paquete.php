<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class tipo_paquete extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
    ];

    public function paquetes()
    {
        return $this->hasMany('App\paquete')->withTrashed();
    }
}
