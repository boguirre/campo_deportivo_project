<?php

namespace Database\Seeders;

use App\Models\Campo;
use App\Models\Horario;
use App\Models\ImagenesCampo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campos = Campo::factory(20)->create();
        foreach ($campos as $campo) {
            ImagenesCampo::factory(4)->create([
                'campo_id' => $campo->id
            ]);

            Horario::factory(5)->create([
                'campo_id' => $campo->id
            ]);
        }
    }
}
