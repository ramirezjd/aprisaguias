<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }
}
