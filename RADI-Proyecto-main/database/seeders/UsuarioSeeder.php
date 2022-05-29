<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'apellidoPaterno' => '',
            'apellidoMaterno' => '',
            'email' => 'admin@gmail.com',
            'tipoUsuario' => '1',
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pancho',
            'apellidoPaterno' => 'Martinez',
            'apellidoMaterno' => 'Martinez',
            'email' => 'pancho@gmail.com',
            'tipoUsuario' => '0',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Eric',
            'apellidoPaterno' => 'Perez',
            'apellidoMaterno' => 'Perez',
            'email' => 'eric@gmail.com',
            'tipoUsuario' => '0',
            'password' => Hash::make('12345678'),
        ]);
    }
}
