<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'nota';
    protected $primaryKey = 'nt_id';
    public $timestamps = false;

    protected $fillable = [
        'per_id',
        'alu_id',
        'pa_id',
        'ags_id',
        'nt_bimestre',
        'nt_nota'
    ];
}
