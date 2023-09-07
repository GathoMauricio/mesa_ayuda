<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['id' => 1, 'nombre_rol' => 'Super Usuario']);
        Rol::create(['id' => 2, 'nombre_rol' => 'Administrador']);
        Rol::create(['id' => 3, 'nombre_rol' => 'Supervisor']);
        Rol::create(['id' => 4, 'nombre_rol' => 'Usuario Final']);
        Rol::create(['id' => 5, 'nombre_rol' => 'Soporte Técnico']);
    }
}
