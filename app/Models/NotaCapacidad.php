<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCapacidad extends Model
{
    use HasFactory;

    protected $table = 'nota_capacidad';
    protected $primaryKey = 'nc_id';
    public $timestamps = false;

    protected $fillable = [
        'nc_descripcion',
        'nc_nota',
        'nt_id',
    ];
}
