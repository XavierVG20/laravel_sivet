<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('diagnostico');
            $table->string('tratamiento');
            $table->integer('id_mascota')->unsigned();
            $table->foreign('id_mascota')->nullable()
            ->references('id')
            ->on('mascotas')
            ->onDelete('cascade');
            $table->integer('id_cita')->nullable()->unsigned();
            $table->foreign('id_cita')->nullable()
            ->references('id')
            ->on('citas')
            ->onDelete('cascade');
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
        Schema::dropIfExists('historial');
    }
}
