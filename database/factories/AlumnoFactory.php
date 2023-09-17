<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Alumno::class;

    public function definition()
    {

        return [
            'id_persona' => random_int(2,21),
            'id_apoderado' => random_int(2,21),
            'estado' => 1
        ];
    }
}
