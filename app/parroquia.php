<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parroquia extends Model
{
    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }

    public function municipio(){
        return $this->belongsTo('App\municipio');
    }

    public function zip_code(){
        return $this->hasOne('App\zip_code');
    }
}
