<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'ubdistrito';
    protected $primaryKey = 'idDist';
    public $timestamps = false;

    protected $fillable = [
        'distrito',
        'idProv'
    ];
}
