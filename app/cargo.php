<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    /**
     * Get the users for the charge.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
