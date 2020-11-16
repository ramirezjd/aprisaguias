<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipo_destino extends Model
{
    use SoftDeletes;
    public function guias()
    {
        return $this->hasMany('App\guia');
    }
}
