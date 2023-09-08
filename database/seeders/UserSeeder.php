<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'rol_id' => 1,
            'cliente_id' => 1,
            'estatus' => 1,
            'nombre' => 'Jack',
            'apaterno' => 'Nightmare',
            'amaterno' => 'skellington',
            'telefono' => '5633943566',
            'telefono_emergencia' => '5525233295',
            'email' => 'mauricio2769@gmail.com',
            'direccion' => 'Calle 9 #226 Reforma, Nezahualcoyotl. Edo. de México',
            'password' => 'Hannibal2769',
            'imagen' => 'perfil.png',
        ]);
    }
}
