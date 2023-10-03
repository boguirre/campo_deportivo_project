<?php

namespace Database\Seeders;

use App\Models\ReservaHorario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservaHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservaHorario::factory(20)->create();
    }
}
