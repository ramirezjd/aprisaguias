<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_destino extends Model
{
    public function guias()
    {
        return $this->hasMany('App\guia');
    }
}
