<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComplejoDeportivo>
 */
class ComplejoDeportivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(),
            'descripcion' => $this->faker->text(),
            'direccion' => $this->faker->sentence(),
            'telefono' => $this->faker->randomElement(['968339642', '963485266', '994777515']),
            'horario' => $this->faker->randomElement(['Lunes a Viernes 09:00 am - 22:00 pm', 'Lunes a Domingo 08:00 am - 23:00 pm']),
            'estado' => $this->faker->randomElement(['1', '0'])
        ];
    }
}
