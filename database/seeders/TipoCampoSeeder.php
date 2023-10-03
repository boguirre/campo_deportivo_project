<?php

namespace Database\Seeders;

use App\Models\TipoCampo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoCampoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoCampo::factory(10)->create();
    }
}
