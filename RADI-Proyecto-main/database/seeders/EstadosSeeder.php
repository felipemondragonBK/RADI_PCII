<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Enviada',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Rechazada',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Aceptada',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Analizar',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Diseñar',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Desarrollar',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Evaluar',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Por hacer',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'En proceso',]);
        DB::table('catalogo_estados')->insert(['nombreEstado' => 'Terminada',]);
    }
}
