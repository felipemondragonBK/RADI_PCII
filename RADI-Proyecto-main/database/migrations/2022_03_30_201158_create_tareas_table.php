<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('idUsuario');//idUsuarioC llave foranea de usuario creador de la solicitud
            $table->unsignedBigInteger('folioProyecto');
            $table->unsignedBigInteger('estadoTarea');//Estado en el que se encuentra la solicitud
            $table->unsignedBigInteger('faseTarea');//Estado en el que se encuentra la solicitud
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('folioProyecto')->references('id')->on('proyectos');
            $table->foreign('estadoTarea')->references('id')->on('catalogo_estados');
            $table->foreign('faseTarea')->references('id')->on('catalogo_estados');
            $table->string('fechaInicio');
            $table->string('fechaFinal');
            $table->text('descripcion');
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
        Schema::dropIfExists('tareas');
    }
}
