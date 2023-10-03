<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(TipoCampoSeeder::class);
        $this->call(CampoSeeder::class);
        $this->call(ComplejoDeportivoSeeder::class);
        $this->call(ComplejoCampoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ReservaHorarioSeeder::class);
        $this->call(DetalleReservaSeeder::class);
    }
}
