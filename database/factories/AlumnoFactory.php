<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dni = fake()->randomNumber(8);
        $letra = chr(ord('A') + $dni % 23);
        return [
            'nombre' => fake()->name(),
            'apellidos' => fake()->lastName(),
            'direccion' => fake()->address(),
            'dni' => "$dni-$letra",
            //
        ];
    }
}
