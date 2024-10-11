<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                'id_rol' => '1',
                'name' => 'Joaquin Rodriguez Lopez',
                'email' => 'jrodriguezl@upv.edu.mx',
                'password' => '123456789'
            ],
            [
                'id_rol' => '2',
                'name' => 'Daniel Ruiz Saldaña',
                'email' => 'druizs@upv.edu.mx',
                'password' => '123456789'
            ],
        );
    }
}
