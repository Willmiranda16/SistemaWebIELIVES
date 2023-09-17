<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipo_periodo';
    protected $primaryKey = 'tp_id';
    public $timestamps = false;

    protected $fillable = [
        'tp_tipo'
    ];
}
