<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'ubdepartamento';
    protected $primaryKey = 'idDepa';
    public $timestamps = false;

    protected $fillable = [
        'departamento'
    ];
}
