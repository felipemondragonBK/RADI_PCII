<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogo_roles')->insert(['nombreRol' => 'Cliente',]);
        DB::table('catalogo_roles')->insert(['nombreRol' => 'Lider',]);
        DB::table('catalogo_roles')->insert(['nombreRol' => 'Equipo',]);
    }
}
