<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios_x_instalacion extends Model
{
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that owns the phone.
     */
    public function instalacion()
    {
        return $this->belongsTo('App\instalaciones');
    }

}
