<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grado';
    protected $primaryKey = 'gra_id';
    public $timestamps = false;

    protected $fillable = [
        'gra_descripcion',
        'niv_id',
        'gra_is_delete'
    ];
}
