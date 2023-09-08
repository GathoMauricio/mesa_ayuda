<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'razon_social' => 'KatzeSystems',
            'rfc' => 'KATSYS8708272H7',
            'direccion' => 'Avinguda Malak, 7, 1º E Vall Moreno del Vallès',
        ]);
    }
}
