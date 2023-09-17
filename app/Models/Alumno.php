<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumno';
    protected $primaryKey = 'alu_id';
    public $timestamps = false;

    protected $fillable = [
        'per_id',
        'apo_id',
        'name_libreta_notas',
        'name_ficha_matricula',
        'alu_estado',
        'is_deleted'
    ];
}
