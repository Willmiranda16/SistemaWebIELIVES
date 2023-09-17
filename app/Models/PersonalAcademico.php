<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAcademico extends Model
{
    use HasFactory;

    protected $table = 'personal_academico';
    protected $primaryKey = 'pa_id';
    public $timestamps = false;

    protected $fillable = [
        'per_id',
        'pa_turno',
        'pa_condicion_laboral',
        'niv_id',
        'pa_especialidad',
        'rol_id',
        'pa_is_tutor',
        'is_deleted'
    ];
}
