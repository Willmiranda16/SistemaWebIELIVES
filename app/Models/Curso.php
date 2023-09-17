<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'curso';
    protected $primaryKey = 'cur_id';
    public $timestamps = false;

    protected $fillable = [
        'cur_nombre',
        'cur_horas',
        'cur_abreviatura',
        'gra_id',
        'niv_id',
        'per_id',
        'cur_estado',
        'is_deleted'
    ];
}
