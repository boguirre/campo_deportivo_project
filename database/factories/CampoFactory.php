<?php

namespace Database\Factories;

use App\Models\TipoCampo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campo>
 */
class CampoFactory extends Factory
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
            'horario' => $this->faker->text(),
            'capacidad' => $this->faker->randomNumber(2),
            'precio' => $this->faker->randomElement([19.99, 29.99, 39.99, 49.99]),
            'estado' => $this->faker->randomElement(['1', '0']),
            'tipo_campo_id' => TipoCampo::all()->random()->id

        ];
    }
}
