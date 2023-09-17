<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Persona::class;

    public function definition()
    {
        return [
            'dni' => $this->faker->randomNumber(8),
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'sexo' => 'F',
            'fecha_nacimiento' => $this->faker->date()
        ];
    }
}
