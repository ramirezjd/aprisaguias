<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class instalacion extends Model
{

    use SoftDeletes;
    protected $table = "instalaciones";

    protected $fillable = [
        'codigo',
        'descripcion',
        'tipo_instalacion_id',
        'urbanizacion',
        'via_principal',
        'edificio_casa',
        'punto_referencia',
        'estado_id',
        'ciudad_id',
        'municipio_id',
        'parroquia_id',
        'zip_code_id'
    ];

    public function usuarios(){
        return $this->hasMany('App\user');
    }

    public function usuarios_x_instalacion()
    {
        return $this->hasMany('App\usuarios_x_instalacion');
    }

    public function subordinados()
    {
        return $this->hasMany('App\instalacion');
    }

    public function tipo_instalacion()
    {
        return $this->belongsTo('App\tipo_instalacion');
    }

    public function instalacion_remitente()
    {
        return $this->belongsTo('App\remesa');
    }

    public function instalacion_destinatario()
    {
        return $this->belongsTo('App\remesa');
    }

    public function estado()
    {
        return $this->belongsTo('App\estado');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\ciudad');
    }

    public function municipio()
    {
        return $this->belongsTo('App\municipio');
    }

    public function parroquia()
    {
        return $this->belongsTo('App\parroquia');
    }

    public function zip_code()
    {
        return $this->belongsTo('App\zip_code');
    }
}
