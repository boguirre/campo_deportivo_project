<?php

namespace Database\Seeders;

use App\Models\ComplejoCampo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplejoCampoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComplejoCampo::factory(20)->create();
    }
}
