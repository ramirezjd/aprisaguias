<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_paquete extends Model
{
    public function paquetes()
    {
        return $this->hasMany('App\paquete');
    }
}
