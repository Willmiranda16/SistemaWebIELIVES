<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodo';
    protected $primaryKey = 'per_id';
    public $timestamps = false;

    protected $fillable = [
        'año_id',
        'per_inicio_matriculas',
        'per_final_matricula',
        'per_limite_cierre',
        'per_tp_notas',
        'per_estado',
        'is_deleted'
    ];
}
