<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            // Usuario del docente
            [
                'name'       => 'Omar Quispe',
                'username'   => 'omarqm',
                'email'      => 'omarqm@practica20.com',
                'password'   => Hash::make('Omar411*'),
                'rol' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tu usuario como administrador
            [
                'name'       => 'Erick Luna',
                'username'   => 'erick',
                'email'      => 'erick@practica20.com',
                'password'   => Hash::make('Erick123*'),
                'rol'        => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 3 usuarios adicionales
            [
                'name'       => 'Maria Lopez',
                'username'   => 'maria',
                'email'      => 'maria@practica20.com',
                'password'   => Hash::make('Maria123*'),
                'rol'        => 'usuario',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Carlos Mendoza',
                'username'   => 'carlos',
                'email'      => 'carlos@practica20.com',
                'password'   => Hash::make('Carlos123*'),
                'rol'        => 'usuario',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Ana Gutierrez',
                'username'   => 'ana',
                'email'      => 'ana@practica20.com',
                'password'   => Hash::make('Ana123*'),
                'rol'        => 'usuario',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}