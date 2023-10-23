<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    use HasFactory;

    protected $table = 'capacidad';
    protected $primaryKey = 'cap_id';
    public $timestamps = false;

    protected $fillable = [
        'cap_descripcion',
        'cur_id',
        'cap_is_deleted'
    ];

    // Define la relación entre capacidades y cursos
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'cur_id', 'cap_id');
    }
}
