<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zip_code extends Model
{
    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }

    public function parroquia(){
        return $this->belongsTo('App\parroquia');
    }
}
