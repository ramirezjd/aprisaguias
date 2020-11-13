<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_instalacion extends Model
{
    protected $table = "tipo_instalaciones";

    public function instalaciones()
    {
        return $this->hasMany('App\tipo_instalacion');
    }
}
