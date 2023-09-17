<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
    use HasFactory;

    protected $table = 'año';
    protected $primaryKey = 'año_id';
    public $timestamps = false;

    protected $fillable = [
        'año_descripcion',
        'año_fechaInicio',
        'año_fechaFin',
        'año_duracionHoraAcademica',
        'año_duracionHoraLibre',
        'año_cantidadPersonal',
        'año_tallerSeleccionable',
        'año_estado',
        'is_deleted'
    ];
}
