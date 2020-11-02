<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paquetes_x_guia extends Model
{
    protected $fillable = [
        'guia_id',
        'paquete_id',
    ];
    public function guia()
    {
        return $this->belongsTo('App\guia');
    }
    public function paquete()
    {
        return $this->belongsTo('App\paquete');
    }
}
