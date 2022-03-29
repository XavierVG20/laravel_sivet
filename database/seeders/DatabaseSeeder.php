<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Clientes::factory(5)->create();
        \App\Models\Proveedores::factory(5)->create();
        $this->call(CategoriasSeeder::class);
        $this->call(ArticulosSeeder::class);
        $this->call(MascotasSeeder::class);

    }
}
