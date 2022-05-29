<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Es la solicitud de un proyecto pero no tiene el titulo del proyecto
        //Falta al quien va dirigido el proyecto
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('asuntoSolicitud');
            $table->unsignedBigInteger('idUsuarioC');//idUsuarioC llave foranea de usuario creador de la solicitud
            $table->unsignedBigInteger('idUsuarioD');//idUsuarioD llave foranea de usuario a quien va dirigida la solicitud
            $table->unsignedBigInteger('idEstado');//Estado en el que se encuentra la solicitud
            $table->foreign('idUsuarioC')->references('id')->on('users');
            $table->foreign('idUsuarioD')->references('id')->on('users');
            $table->foreign('idEstado')->references('id')->on('catalogo_estados');
            $table->string('fechaSolicitud');
            $table->text('descripcionSolic');
            $table->string('documentoDescripcion');
            $table->string('fechaInicio');
            $table->string('fechaFin');
            $table->text('retroalimentacion');
            $table->string('idDocumento');
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
        Schema::dropIfExists('solicituds');
    }
}
