<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignarGrado extends Model
{
    use HasFactory;

    protected $table = 'asignacion_grado';
    protected $primaryKey = 'asig_id';
    public $timestamps = false;

    protected $fillable = [
        'pa_id',
        'niv_id',
        'gra_id',
        'seccion',
        'asig_is_deleted'
    ];
}
