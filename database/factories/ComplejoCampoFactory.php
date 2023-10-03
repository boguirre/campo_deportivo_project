<?php

namespace Database\Factories;

use App\Models\Campo;
use App\Models\ComplejoDeportivo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComplejoCampo>
 */
class ComplejoCampoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_complejo' => ComplejoDeportivo::all()->random()->id,
            'id_campo' => Campo::all()->random()->id,
            'estado' => $this->faker->randomElement(['1'])
        ];
    }
}
