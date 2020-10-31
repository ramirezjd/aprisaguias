<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }

    public function estado(){
        return $this->belongsTo('App\estado');
    }

    public function ciudades(){
        return $this->hasMany('App\ciudad');
    }

    public function parroquias(){
        return $this->hasMany('App\parroquia');
    }
}
