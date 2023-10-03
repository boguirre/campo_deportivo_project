<?php

namespace Database\Seeders;

use App\Models\DetalleReserva;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetalleReserva::factory(20)->create();
    }
}
