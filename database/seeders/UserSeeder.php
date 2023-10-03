<?php

namespace Database\Seeders;

use App\Models\Reserva;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $myuser = User::create([
            'name'=>'Bruno Aguirre',
            'email'=>'boguirre@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        $users = User::factory(20)->create();

        foreach ($users as $user) {
            Reserva::factory(1)->create([
                'id_usuario' => $user->id
            ]);
        }
    }
}
