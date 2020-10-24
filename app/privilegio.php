<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class privilegio extends Model
{
    public function privilegios_x_usuario()
    {
        return $this->hasMany('App\privilegios_x_usuario');
    }
}
