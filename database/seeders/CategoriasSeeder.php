<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categorias::factory(3)->create();
        DB::table('categorias')->insert(array(
            'nombre' => 'Comida',
            'descripcion' => 'Comida para animales'
        ));

        DB::table('categorias')->insert(array(
            'nombre' => 'Medicina',
            'descripcion' => 'Medicina para animales'
        ));
    }
}
