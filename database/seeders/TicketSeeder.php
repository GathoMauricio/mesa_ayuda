<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::truncate();
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 6,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Baja',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla turpis augue, tristique venenatis mi feugiat at.',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 2,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Normal',
            'descripcion' => 'mus mi imperdiet. Suspendisse mauris nisi, venenatis vel arcu sed, ultrices volutpat velit. Aenean faucibus porttitor nisi, gravida porta massa lacinia vitae. Aliquam rutrum, eros',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 3,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Urgente',
            'descripcion' => 'Morbi facilisis, augue vel mollis gravida, eros magna euismod ligula, sit amet molestie elit risus in felis. Sed ac mauris ipsum. Suspendisse non odio ',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 4,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Normal',
            'descripcion' => 'Pellentesque dui nunc, ultricies eget sapien vel, sodales lobortis est. Integer non elementum arcu, a consequat enim. Vestibulum scelerisque ex eu odio porttitor mattis. Praesent ',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 6,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Urgente',
            'descripcion' => 'mi imperdiet. Suspendisse mauris nisi, venenatis vel arcu sed, ultrices volutpat velit. Aenean faucibus porttitor nisi, gravida porta massa lacinia vitae. Aliquam rutrum, eros ac pharetra suscipit, felis eros suscipit lectus, rutrum hendrerit est ante ac ex. Phasellus lacinia pellentesque tellus. Fusce ut sodales velit. Morbi facilisis, augue vel mollis gravida, eros magna euismod ligula, sit amet molestie elit risus in felis. ',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 2,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Baja',
            'descripcion' => 'Praesent tempus lacus ac dui lobortis condimentum. Aliquam mattis eleifend faucibus. Fusce finibus sodales tellus eget imperdiet. Praesent in sapien viverra,',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 1,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Urgente',
            'descripcion' => 'purus condimentum. Morbi eget tempor massa, quis vulputate ante. Quisque accumsan commodo luctus. Interdum et malesuada fames ',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 5,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Alta',
            'descripcion' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur at luctus tortor. Cras scelerisque,',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 4,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Baja',
            'descripcion' => 'ultricies eget sapien vel, sodales lobortis est. Integer non elementum arcu, a consequat enim. Vestibulum scelerisque ex eu odio porttitor mattis. Praesent tempus lacus ac dui lobortis condimentum. Aliquam mattis eleifend faucibus. Fusce finibus sodales tellus eget imperdiet.',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 6,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Urgente',
            'descripcion' => 'Aliquam lectus dolor, suscipit vel ante ac, accumsan interdum nunc. Aenean viverra condimentum justo, quis posuere neque iaculis at. Curabitur facilisis metus sit amet est ornare,',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 2,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Normal',
            'descripcion' => 'vitae malesuada purus condimentum. Morbi eget tempor massa, quis vulputate ante. Quisque accumsan commodo luctus.',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 1,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Alta',
            'descripcion' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur at luctus tortor',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 6,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Baja',
            'descripcion' => 'netus et malesuada fames ac turpis egestas. Donec ullamcorper, enim ut condimentum accumsan, tortor lacus sollicitudin justo, id commodo mi velit eu lectus.',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 5,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Alta',
            'descripcion' => 'Phasellus ut tellus velit. Fusce semper sagittis erat id euismod. Donec feugiat, nulla sit amet aliquam porta, purus ligula molestie orci, eget rhoncus nulla magna eu turpis.',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 4,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Normal',
            'descripcion' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur at luctus tortor. Cras scelerisque, ',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 3,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Baja',
            'descripcion' => 'Quisque accumsan commodo luctus. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 2,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Alta',
            'descripcion' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur at luctus tortor. Cras scelerisque, ex ut lacinia',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 1,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Urgente',
            'descripcion' => 'Mauris pulvinar turpis sed ex sagittis ullamcorper. Praesent vitae enim vitae dui dapibus lobortis quis at urna. Pellentesque habitant',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 4,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Normal',
            'descripcion' => 'id commodo mi velit eu lectus. Vivamus vehicula, elit a pulvinar blandit,',
        ]);
        Ticket::create([
            'estatus_id' => 1,
            'sintoma_id' => 6,
            'usuario_final_id' => 1,
            'folio' => 'T-1|' . random_int(100000, 999999),
            'prioridad' => 'Baja',
            'descripcion' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ullamcorper, enim ut condimentum accumsan, tortor lacus sollicitudin justo, id commodo mi velit eu lectus. Vivamus vehicula, elit a pulvinar blandit, felis sapien rhoncus enim, vel fringilla massa odio non dui. Duis sed efficitur sapien.',
        ]);
    }
}
