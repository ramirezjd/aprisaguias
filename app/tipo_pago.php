<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_pago extends Model
{
    public function guias()
    {
        return $this->hasMany('App\guia');
    }
}
