<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignarCurso extends Model
{
    use HasFactory;

    protected $table = 'asignacion_curso';
    protected $primaryKey = 'asig_id';
    public $timestamps = false;

    protected $fillable = [
        'pa_id',
        'niv_id',
        'grad_id',
        'curso',
        'asig_is_deleted'
    ];
}
