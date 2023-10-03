<?php

namespace Database\Factories;

use App\Models\Campo;
use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleReserva>
 */
class DetalleReservaFactory extends Factory
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
            'id_campo' => Campo::all()->random()->id,
            'total' => $this->faker->randomElement([29.99, 56.99])
        ];
    }
}
