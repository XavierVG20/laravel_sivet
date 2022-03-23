<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('num_id');
            $table->string('telefono');
            $table->string('email');
           
        });
    }

    /**
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
