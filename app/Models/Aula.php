<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $table = 'aula';
    protected $primaryKey = 'ala_id';
    public $timestamps = false;

    protected $fillable = [
        'ala_descripcion',
        'ala_tipo',
        'ala_aforo',
        'ala_ubicacion',
        'ala_en_uso',
        'ala_estado',
        'ala_is_delete'
    ];
}
