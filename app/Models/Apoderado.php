<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    use HasFactory;

    protected $table = 'apoderado';
    protected $primaryKey = 'apo_id';
    public $timestamps = false;

    protected $fillable = [
        'per_id',
        'apo_parentesco',
        'apo_vive_con_estudiante',
        'is_deleted'
    ];
}
