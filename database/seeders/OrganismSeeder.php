<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organism;

class OrganismSeeder extends Seeder
{
    public function run(): void
    {
        Organism::create([
            'name' => 'Universidad Politecnica de Victoria',
            'address' => 'Av. Nuevas Tecnologías 5902, Parque Científico y Tecnológico de Tamaulipas, 87138 Cdad. Victoria, Tamps.'
        ]);
    }
}
