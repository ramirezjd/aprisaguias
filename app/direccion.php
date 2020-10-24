<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    public function cliente()
    {
        return $this->belongsTo('App\cliente');
    }

    public function instalacion()
    {
        return $this->belongsTo('App\instalacion');
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
