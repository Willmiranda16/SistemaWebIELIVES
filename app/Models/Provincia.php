<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'ubprovincia';
    protected $primaryKey = 'idProv';
    public $timestamps = false;

    protected $fillable = [
        'provincia',
        'idDepa'
    ];
}
