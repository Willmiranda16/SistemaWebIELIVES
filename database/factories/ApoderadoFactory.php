<?php

namespace Database\Factories;

use App\Models\Apoderado;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApoderadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Apoderado::class;

    public function definition()
    {
        return [
            'dni' => $this->faker->randomNumber(8),
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'celular' => $this->faker->randomNumber(9),
            'parantesco' => 'Padre'
        ];
    }
}
