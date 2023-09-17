<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    protected $table = 'institucion_educativa';
    protected $primaryKey = 'ie_id';
    public $timestamps = false;

    protected $fillable = [
        'ie_codigo_modular',
        'ie_anexo',
        'ie_nivel',
        'ie_nombre',
        'ie_gestion',
        'ie_departamento',
        'ie_provincia',
        'ie_distrito',
        'ie_direccion',
        'ie_dre',
        'ie_ugel',
        'ie_turno',
        'ie_dias_laborales',
        'ie_director',
        'ie_telefono',
        'ie_email',
        'ie_web'
    ];
}
