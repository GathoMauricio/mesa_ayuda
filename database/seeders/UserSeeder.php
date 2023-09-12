<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::truncate();
        User::create([
            'rol_id' => 1,
            'cliente_id' => 0, //SuperUsuario
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
        User::create([
            'rol_id' => 2, //Administrador
            'cliente_id' => 1,
            'estatus' => 1,
            'nombre' => 'Soy Administrador',
            'apaterno' => 'Lorem',
            'amaterno' => 'Ipsum',
            'telefono' => '5585457845',
            'telefono_emergencia' => '5525148694',
            'email' => 'supervisor@mail.com',
            'direccion' => 'Bahia de las palmas #10 Anzures',
            'password' => '12345678',
            'imagen' => 'perfil.png',
        ]);
        User::create([
            'rol_id' => 3, //Supervisor
            'cliente_id' => 1,
            'estatus' => 1,
            'nombre' => 'Soy Supervisor',
            'apaterno' => 'Lorem',
            'amaterno' => 'Ipsum',
            'telefono' => '5585457845',
            'telefono_emergencia' => '5525148694',
            'email' => 'supervisor@mail.com',
            'direccion' => 'Bahia de las palmas #10 Anzures',
            'password' => '12345678',
            'imagen' => 'perfil.png',
        ]);
        User::create([
            'rol_id' => 4, //Usuario Final
            'cliente_id' => 1,
            'estatus' => 1,
            'nombre' => 'Usuario Finalr',
            'apaterno' => 'Lorem',
            'amaterno' => 'Ipsum',
            'telefono' => '5585457845',
            'telefono_emergencia' => '5525148694',
            'email' => 'supervisor@mail.com',
            'direccion' => 'Bahia de las palmas #10 Anzures',
            'password' => '12345678',
            'imagen' => 'perfil.png',
        ]);
        User::create([
            'rol_id' => 5, //Supervisor
            'cliente_id' => 1,
            'estatus' => 1,
            'nombre' => 'Soporte Tecnico',
            'apaterno' => 'Lorem',
            'amaterno' => 'Ipsum',
            'telefono' => '5585457845',
            'telefono_emergencia' => '5525148694',
            'email' => 'supervisor@mail.com',
            'direccion' => 'Bahia de las palmas #10 Anzures',
            'password' => '12345678',
            'imagen' => 'perfil.png',
        ]);
    }
}
