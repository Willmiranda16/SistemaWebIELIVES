<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horario';
    protected $primaryKey = 'hor_id';
    public $timestamps = false;

    protected $fillable = [
        'per_id',
        'ags_id',
        'cur_id',
        'fecha',
        'dia',
        'hora_inicio',
        'hora_fin',
        'color',
        'is_deleted'
    ];
}
