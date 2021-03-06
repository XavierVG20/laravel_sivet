<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_empresa');
            $table->string('n_ruc');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('descripcion');
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
        Schema::dropIfExists('empresa');
    }
}
