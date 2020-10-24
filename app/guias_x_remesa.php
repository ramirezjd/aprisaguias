<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guias_x_remesa extends Model
{
    public function guia()
    {
        return $this->belongsTo('App\guia');
    }

    public function remesa()
    {
        return $this->belongsTo('App\remesa');
    }
}
