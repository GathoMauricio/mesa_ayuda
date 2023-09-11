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
            'nombre' => 'Jacky',
            'apaterno' => 'skellington',
            'amaterno' => 'Burton',
            'telefono' => '5585457845',
            'telefono_emergencia' => '5525148694',
            'email' => 'test@mail.com',
            'direccion' => 'Bahia de las palmas #10 Anzures',
            'password' => '12345678',
            'imagen' => 'perfil.png',
        ]);
    }
}
