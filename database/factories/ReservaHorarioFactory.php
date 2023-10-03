<?php

namespace Database\Factories;

use App\Models\Horario;
use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservaHorario>
 */
class ReservaHorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_reserva' => Reserva::all()->random()->id,
            'id_horario' => Horario::all()->random()->id,
            'estado' => $this->faker->randomElement(['1'])
        ];
    }
}
