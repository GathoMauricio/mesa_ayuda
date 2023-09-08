<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sintoma;

class SintomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sintoma::create(['categoria_id' => 1, 'sintoma' => 'Sin acceso']); //Correo Electrónico'
        Sintoma::create(['categoria_id' => 2, 'sintoma' => 'Datos incorrectos']); //Facturación Electronica
        Sintoma::create(['categoria_id' => 3, 'sintoma' => 'Sin conexión']); //Internet
        Sintoma::create(['categoria_id' => 4, 'sintoma' => 'Error de datos personales']); //Documentación
        Sintoma::create(['categoria_id' => 5, 'sintoma' => 'Datos faltantes']); //Contratación
        Sintoma::create(['categoria_id' => 6, 'sintoma' => 'Error en productos']); //Marketing Digital
    }
}
