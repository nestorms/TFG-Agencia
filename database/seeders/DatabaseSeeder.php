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



        $usuarioMedio = User::where('rol', 'medio')->get()->random();

        Noticia::create([
            'titulo' => 'El Athletic tiene un color especial',
            'descripcion' => 'Enfila la final de Sevilla convirtiéndose en el primer equipo que toma esta temporada el Metropolitano, gracias a un penalti transformado por Berenguer tras grave error de Reinildo',
            'contenido' => 'El Cholo avisó de que este partido dura 180 minutos, con los 90 del Metropolitano no iba a llegar, pero el Athletic se plantará en los que aún han de jugarse con evidente ventaja, la que conceden el gol de Berenguer para convertirse en el primer equipo que toma esta temporada el Metropolitano y que vaya a ser San Mamés en tres semanas quien tenga la última palabra. Señor equipo el de Valverde, porque hay que serlo para doblegar a señor equipo el de Simeone. Entre tanto acierto podía valer con un error... y el que lo cometió fue Reinildo. Luego no hubo forma humana de meter cuchara en el área visitante.
                            En un lado de la balanza, su velocidad para neutralizar la de Iñaki y su posición para dar carrete a Lino por la banda; en el otro, su exceso de energía, su trato con la pelota y los escasos minutos que ha jugado con la rojiblanca desde la lesión. Al del traje negro le pareció que el aparato se inclinaba en todo caso hacia las primeras referencias y envidó con Reinildo en la alineación. Salió cruz. En el ecuador del primer acto, y con el partido equilibrado, el mozambiqueño se aturulló en la salida y estuvo a punto de regalarla. Pero no quedó ahí la cosa: asustado quizás por lo que pudo ser, en la continuación de la jugada hizo una entrada infame a Prados justo cuando éste superaba la línea del área.',
            'foto' => 'images/coparey.jpg',
            'likes' => random_int(10,150),
            'palabras_clave' => 'laliga,futbol,copa,rey',
            'hora'=>date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'categoria_id'=>1,
            'redactor_id' => $usuarioMedio->id,
            ]);

        /**********************   NOTICIAS ECONOMIA    ************************* */

        NoticiaController::crearNoticias("economica","Economía");
        NoticiaController::crearNoticias("deporte","Deportes");
        NoticiaController::crearNoticias("arbitro","Deportes");
        //NoticiaController::crearNoticias("movil","Tecnología");



    }
}
