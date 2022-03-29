<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mascotas')->insert(array(
            'nombre_mascota'=>'Laura',
            'id_cliente' => '1',
            'especie' => 'Perro',
            'raza' => 'Pastora Francesa',
            'sexo' => 'Hembra',
            'color' => 'Negro y Blanco',
            'fecha_nacimiento' => '1999-03-03',
        ),
            array(
                'nombre_mascota'=>'exam',
                'id_cliente' => '4',
                'especie' => 'Perro',
                'raza' => 'NA',
                'sexo' => 'Macho',
                'color' => 'Negro',
                'fecha_nacimiento' => '1990-06-03',
                )
        );

        DB::table('mascotas')->insert(
            array(
                'nombre_mascota'=>'DOG',
                'id_cliente' => '4',
                'especie' => 'Perro',
                'raza' => 'NA',
                'sexo' => 'Macho',
                'color' => 'Negro',
                'fecha_nacimiento' => '1990-06-03',
                )
        );

        DB::table('mascotas')->insert(
            array(
                'nombre_mascota'=>'CAT',
                'id_cliente' => '4',
                'especie' => 'Gato',
                'raza' => 'NA',
                'sexo' => 'Macho',
                'color' => 'Negro',
                'fecha_nacimiento' => '2000-06-03',
                )
        );
        DB::table('mascotas')->insert(
            array(
                'nombre_mascota'=>'PER',
                'id_cliente' => '4',
                'especie' => 'Gato',
                'raza' => 'NA',
                'sexo' => 'Hembra',
                'color' => 'grid',
                'fecha_nacimiento' => '2004-01-06',
                )
        );
    }
}
