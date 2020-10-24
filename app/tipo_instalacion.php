<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_instalacion extends Model
{
    public function instalaciones()
    {
        return $this->hasMany('App\tipo_instalacion');
    }
}
