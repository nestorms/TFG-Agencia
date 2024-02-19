<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Noticia;
use App\Http\Controllers\NoticiaController;
use App\Models\Category;

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
            'nombre' => 'David',
            'email' => 'david@ex.com',
            'password' => 'david1234',
            'rol' => 'medio',
            'apellidos' => 'Martínez Díaz',
            'empresa' => 'RandomSA',
            'telefono' => '722433618',
            'enlace' => 'randomize.com',
            
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

        Category::create([
            'nombre' => 'Economía',
            'descripcion' => 'Noticias sobre la economía española e internacional.',
            'palabras_clave' => 'ibex,dinero,economia,pib,gobierno',
        ]);

        Category::create([
            'nombre' => 'Deportes',
            'descripcion' => 'Noticias sobre los eventos deportivos nacionales e internacionales.',
            'palabras_clave' => 'laliga,futbol,baloncesto,campeonato,champions',
        ]);



        /**********************   NOTICIAS ECONOMIA    ************************* */

        NoticiaController::crearNoticias("economica","Economía");
        NoticiaController::crearNoticias("deporte","Deportes");
        NoticiaController::crearNoticias("arbitro","Deportes");
        //NoticiaController::crearNoticias("movil","Tecnología");



    }
}
