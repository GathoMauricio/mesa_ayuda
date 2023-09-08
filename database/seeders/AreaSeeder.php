<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'id' => 1,
            'area' => 'Tecnologías de la Información'
        ]);
        Area::create([
            'id' => 2,
            'area' => 'Recursos Humanos'
        ]);
        Area::create([
            'id' => 3,
            'area' => 'Ventas'
        ]);
    }
}
