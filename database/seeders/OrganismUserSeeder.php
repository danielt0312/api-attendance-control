<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganismUser;

class OrganismUserSeeder extends Seeder
{
    public function run(): void
    {
        OrganismUser::insert(
            [ 'id_organism' => '1', 'id_user' => '1'],
        );
    }
}
