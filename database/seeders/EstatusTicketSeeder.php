<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstatusTicket;

class EstatusTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstatusTicket::create([
            'id' => 1,
            'estatus' => 'Creado',
            'descripcion' => 'El ticket ha sido creado.'
        ]);
        EstatusTicket::create([
            'id' => 2,
            'estatus' => 'Abierto',
            'descripcion' => 'El ticket se encuentra en revición.'
        ]);
        EstatusTicket::create([
            'id' => 3,
            'estatus' => 'Cerrado',
            'descripcion' => 'El ticket ha concluido.'
        ]);
    }
}
