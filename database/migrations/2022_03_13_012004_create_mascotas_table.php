<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_mascota');
            $table->integer('id_cliente')->nullable()->unsigned();
            $table->foreign('id_cliente')
            ->references('id')
            ->on('clientes')->onDelete('cascade');
            $table->string('especie');
            $table->string('raza');
            $table->string('sexo');
            $table->string('color');
            $table->date('fecha_nacimiento');
            $table->integer('id_media')->nullable()->unsigned();
            $table->foreign('id_media')->references('id_media')->on('media');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
