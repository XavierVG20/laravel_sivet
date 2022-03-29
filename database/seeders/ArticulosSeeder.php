<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articulos')->insert(array(
            'id_categoria'=>'1',
            'codigo'=>'123psds',
            'articulo' => 'Procan',
            'descripcion' => 'alimenta para perros....',
            'stock'=> '5',
            'precio_venta' => '12.00',
            'condicion' => '1' 
        ));

        DB::table('articulos')->insert(array(
            'id_categoria'=>'1',
            'codigo'=>'a004',
            'articulo' => 'Canny',
            'descripcion' => 'alimenta para perros....',
            'stock'=> '5',
            'precio_venta' => '10.00' ,
            'condicion' => '1' 
        ));

        DB::table('articulos')->insert(array(
            'id_categoria'=>'2',
            'codigo'=>'v001',
            'articulo' => 'VRabia',
            'descripcion' => 'Vacuna contra la rrabie',
            'stock'=> '5',
            'precio_venta' => '10.00' ,
            'condicion' => '1' 
        ));
    }
}
