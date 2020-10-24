<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parroquia extends Model
{
    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }
}
