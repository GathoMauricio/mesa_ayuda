<?php

namespace Database\Seeders;

use App\Models\EstatusTicket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(AreaSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(SintomaSeeder::class);
        $this->call(EstatusTicketSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TicketSeeder::class);
    }
}
