<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    public function direccion()
    {
        return $this->hasOne('App\direccion');
    }
}
