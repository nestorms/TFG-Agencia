<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
             'nombre' => 'Néstor',
             'email' => 'nestor@example.com',
             'password' => 'test',
             'rol' => 'admin',
             'apellidos' => 'Martínez Sáez',
             'telefono' => '123456789',
         ]);

        User::create([
            'nombre' => 'Josep',
            'email' => 'pedrerol@example.com',
            'password' => 'becarios',
            'rol' => 'medio',
            'apellidos' => 'Pedrerol Alonso',
            'empresa' => 'Jugones SA',
            'telefono' => '672846282',
            'enlace' => 'chiringuitojugones.com',
            
        ]);

        User::create([
            'nombre' => 'Migue',
            'email' => 'migue@ex.com',
            'password' => 'migue1234',
            'rol' => 'medio',
            'apellidos' => 'Rosado García',
            'empresa' => 'Princess',
            'telefono' => '675433628',
            'enlace' => 'noticiasprincesa.com',
            
        ]);
    }
}
