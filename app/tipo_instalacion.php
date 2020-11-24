<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipo_instalacion extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];


    protected $table = "tipo_instalaciones";

    public function instalaciones()
    {
        return $this->hasMany('App\instalacion');
    }
}
