<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class privilegios_x_usuario extends Model
{
    /**
     * Get the user that owns the phone.
     */
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that owns the phone.
     */
    public function privilegio()
    {
        return $this->belongsTo('App\privilegio');
    }
}
