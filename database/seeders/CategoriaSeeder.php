<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'id' => 1,
            'area_id' => 1, //Tecnologías de la Información
            'categoria' => 'Correo Electrónico'
        ]);
        Categoria::create([
            'id' => 2,
            'area_id' => 1, //Tecnologías de la Información
            'categoria' => 'Facturación Electronica'
        ]);
        Categoria::create([
            'id' => 3,
            'area_id' => 1, //Tecnologías de la Información
            'categoria' => 'Internet'
        ]);

        Categoria::create([
            'id' => 4,
            'area_id' => 2, //Recursos Humanos
            'categoria' => 'Documentación'
        ]);
        Categoria::create([
            'id' => 5,
            'area_id' => 2, //Recursos Humanos
            'categoria' => 'Contratación'
        ]);

        Categoria::create([
            'id' => 6,
            'area_id' => 3, //Ventas
            'categoria' => 'Marketing Digital'
        ]);
    }
}
