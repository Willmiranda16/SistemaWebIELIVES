<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gsa extends Model
{
    use HasFactory;

    protected $table = 'gsa';
    protected $primaryKey = 'ags_id';
    public $timestamps = false;

    protected $fillable = [
        'ala_id',
        'niv_id',
        'gra_id',
        'sec_id',
        'is_deleted'
    ];
}
