<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    protected $table = "direcciones";

    protected $fillable = [
        'urbanizacion',
        'via-principal',
        'edificio-casa',
        'punto-referencia',
        'estado_id',
        'ciudad_id',
        'municipio_id',
        'parroquia_id',
        'zip_code_id'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\cliente');
    }

    public function estado()
    {
        return $this->belongsTo('App\estado');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\ciudad');
    }

    public function municipio()
    {
        return $this->belongsTo('App\municipio');
    }

    public function parroquia()
    {
        return $this->belongsTo('App\parroquia');
    }

    public function zip_code()
    {
        return $this->belongsTo('App\zip_code');
    }
}
