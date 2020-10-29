<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ciudad extends Model
{
    protected $table = "ciudades";

    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }

    public function municipio(){
        return $this->belongsTo('App\municipio');
    }



}
