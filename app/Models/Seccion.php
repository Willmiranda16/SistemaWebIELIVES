<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $table = 'seccion';
    protected $primaryKey = 'sec_id';
    public $timestamps = false;

    protected $fillable = [
        'sec_descripcion',
        'sec_tutor',
        'sec_aula',
        'gra_id',
        'sec_periodo',
        'sec_vacantes',
        'sec_is_delete'
    ];
}
