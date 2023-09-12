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
        Cliente::truncate();
        Cliente::create([
            'id' => 1,
            'razon_social' => 'KatzeSystems',
            'rfc' => 'KATSYS8708272H7',
            'direccion' => 'Avinguda Malak, 7, 1º E Vall Moreno del Vallès',
        ]);
        Cliente::create([
            'id' => 2,
            'razon_social' => 'Dotech',
            'rfc' => 'DOTECH8708272H7',
            'direccion' => 'Bahia de las palmas 3000',
        ]);
    }
}
