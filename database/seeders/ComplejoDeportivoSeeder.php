<?php

namespace Database\Seeders;

use App\Models\ComplejoDeportivo;
use App\Models\ImagenesComplejo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplejoDeportivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $complejos = ComplejoDeportivo::factory(20)->create();

        foreach ($complejos as $complejo) {
            ImagenesComplejo::factory(3)->create([
                'complejo_id' => $complejo->id
            ]);
        }
    }
}
