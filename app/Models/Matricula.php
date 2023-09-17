<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matricula';
    protected $primaryKey = 'mat_id';
    public $timestamps = false;

    protected $fillable = [
        'per_id',
        'alu_id',
        'ags_id',
        'mat_fecha',
        'mat_situacion',
        'mat_colegio_procedencia',
        'mat_tipo_procedencia',
        'mat_observacion',
        'mat_estado',
        'is_deleted'
    ];
}
