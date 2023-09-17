<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';
    protected $primaryKey = 'per_id';
    public $timestamps = false;

    protected $fillable = [
        'per_dni',
        'per_nombres',
        'per_apellidos',
        'per_nombre_completo',
        'per_email',
        'per_sexo',
        'per_fecha_nacimiento',
        'per_estado_civil',
        'per_celular',
        'per_pais',
        'per_departamento',
        'per_provincia',
        'per_distrito',
        'per_direccion',
        'is_deleted',
    ];
}
