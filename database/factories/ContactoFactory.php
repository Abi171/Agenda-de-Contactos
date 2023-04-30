<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contacto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->firstname,
            'apellido'=>$this->faker->lastname,
            'correo_electronico'=>$this->faker->unique()->safeEmail,
            'telefono'=>$this->faker->phoneNumber
        ];
    }
}
