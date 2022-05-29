<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajaEnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabaja_ens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('folioProyecto');
            $table->unsignedBigInteger('idRolUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('folioProyecto')->references('id')->on('proyectos');
            $table->foreign('idRolUsuario')->references('id')->on('catalogo_roles');
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
        Schema::dropIfExists('trabaja_ens');
    }
}
