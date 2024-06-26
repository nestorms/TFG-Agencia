<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Noticia;
use App\Http\Controllers\NoticiaController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\UserNoticia;

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
             'email' => 'nestor@ex.com',
             'password' => 'nestor',
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
            'nombre' => 'Ana',
            'email' => 'ana@ex.com',
            'password' => 'ana1234',
            'rol' => 'medio',
            'apellidos' => 'Gómez López',
            'empresa' => 'Diario ABC',
            'telefono' => '987654321',
            'enlace' => 'diarioabc.es',
        ]);

        User::create([
            'nombre' => 'Javier',
            'email' => 'javier@ex.com',
            'password' => 'javier1234',
            'rol' => 'medio',
            'apellidos' => 'Fernández Rodríguez',
            'empresa' => 'El País',
            'telefono' => '789123456',
            'enlace' => 'elpais.com',
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
            'nombre' => 'Néstor',
            'email' => 'nestor@example.com',
            'password' => 'nestor1234',
            'rol' => 'medio',
            'apellidos' => 'Martínez Sáez',
            'empresa' => 'Relevo',
            'telefono' => '675433628',
            'enlace' => 'relevo.com',
            
        ]);

        User::create([
            'nombre' => 'Alex',
            'email' => 'alex@ex.com',
            'password' => 'alex1234',
            'rol' => 'redactor',
            'apellidos' => 'Vallecillo Zorrilla',
            'empresa' => 'BasketFans',
            'telefono' => '622433428',
            'enlace' => 'basketfans.com',
            
        ]);

        User::create([
            'nombre' => 'Raúl',
            'email' => 'raul@ex.com',
            'password' => 'raul1234',
            'rol' => 'redactor',
            'apellidos' => 'Meco Alvarez',
            'empresa' => 'Marca',
            'telefono' => '622433428',
            'enlace' => 'marca.com',
            
        ]);

        User::create([
            'nombre' => 'Mario',
            'email' => 'mario@ex.com',
            'password' => 'mario1234',
            'rol' => 'redactor',
            'apellidos' => 'Martínez Sáez',
            'empresa' => 'Europa Press',
            'telefono' => '622133428',
            'enlace' => 'press.com',
            
        ]);

        User::create([
            'nombre' => 'Álvaro',
            'email' => 'alvaro@ex.com',
            'password' => 'alvaro1234',
            'rol' => 'redactor',
            'apellidos' => 'Megías Sandoval',
            'empresa' => 'Relevo',
            'telefono' => '622433468',
            'enlace' => 'relevo.com',
            
        ]);

        User::create([
            'nombre' => 'Jose Manuel',
            'email' => 'josema@ex.com',
            'password' => 'josema1234',
            'rol' => 'redactor',
            'apellidos' => 'Sevilla Rodríguez',
            'empresa' => 'Reuters',
            'telefono' => '622433218',
            'enlace' => 'reuters.com',
            
        ]);

        User::create([
            'nombre' => 'María',
            'email' => 'maria@ex.com',
            'password' => 'maria1234',
            'rol' => 'redactor',
            'apellidos' => 'García Pérez',
            'empresa' => 'Noticias al Día',
            'telefono' => '987654321',
            'enlace' => 'noticiasaldia.com',
        ]);

        User::create([
            'nombre' => 'Juan',
            'email' => 'juan@ex.com',
            'password' => 'juan1234',
            'rol' => 'redactor',
            'apellidos' => 'Martínez López',
            'empresa' => 'Últimas Noticias',
            'telefono' => '123456789',
            'enlace' => 'ultimasnoticias.com',
        ]);

        User::create([
            'nombre' => 'Laura',
            'email' => 'laura@ex.com',
            'password' => 'laura1234',
            'rol' => 'redactor',
            'apellidos' => 'Fernández Gómez',
            'empresa' => 'Información Diaria',
            'telefono' => '456789123',
            'enlace' => 'informaciondiaria.com',
        ]);

        User::create([
            'nombre' => 'Carlos',
            'email' => 'carlos@ex.com',
            'password' => 'carlos1234',
            'rol' => 'redactor',
            'apellidos' => 'Rodríguez Martín',
            'empresa' => 'Noticias Online',
            'telefono' => '789123456',
            'enlace' => 'noticiasonline.com',
        ]);

        Category::create([
            'nombre' => 'Economía',
            'descripcion' => 'Noticias sobre la economía española e internacional.',
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
        ]);

        Category::create([
            'nombre' => 'Deportes',
            'descripcion' => 'Noticias sobre los eventos deportivos nacionales e internacionales.',
            'palabras_clave' => 'futbol,deporte,baloncesto,tenis,partido,entrenador',
        ]);

        Category::create([
            'nombre' => 'Tecnología',
            'descripcion' => 'Noticias sobre la tecnología global y actualizada.',
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
        ]);

        Category::create([
            'nombre' => 'Arte',
            'descripcion' => 'Noticias sobre el arte histórico y contemporáneo',
            'palabras_clave' => 'arte, historia, cultura, artista',
        ]);

        Category::create([
            'nombre' => 'Política',
            'descripcion' => 'Noticias sobre el entorno político de España e internacional',
            'palabras_clave' => 'politica, gobierno, estado, leyes',
        ]);
        


        $usuarioMedio = User::where('rol', 'medio')->get()->random();
        $usuarioRedactor = User::where('rol', 'redactor')->get()->random();


        /********************************************       PRIMERAS NOTICIAS        ************************************************  */

        Noticia::create([
            'titulo' => 'El Athletic tiene un color especial',
            'descripcion' => 'Enfila la final de Sevilla convirtiéndose en el primer equipo que toma esta temporada el Metropolitano, gracias a un penalti transformado por Berenguer tras grave error de Reinildo',
            'contenido' => 'El Cholo avisó de que este partido dura 180 minutos, con los 90 del Metropolitano no iba a llegar, pero el Athletic se plantará en los que aún han de jugarse con evidente ventaja, la que conceden el gol de Berenguer para convertirse en el primer equipo que toma esta temporada el Metropolitano y que vaya a ser San Mamés en tres semanas quien tenga la última palabra. Señor equipo el de Valverde, porque hay que serlo para doblegar a señor equipo el de Simeone. Entre tanto acierto podía valer con un error... y el que lo cometió fue Reinildo. Luego no hubo forma humana de meter cuchara en el área visitante.
            En un lado de la balanza, su velocidad para neutralizar la de Iñaki y su posición para dar carrete a Lino por la banda; en el otro, su exceso de energía, su trato con la pelota y los escasos minutos que ha jugado con la rojiblanca desde la lesión. Al del traje negro le pareció que el aparato se inclinaba en todo caso hacia las primeras referencias y envidó con Reinildo en la alineación. Salió cruz. En el ecuador del primer acto, y con el partido equilibrado, el mozambiqueño se aturulló en la salida y estuvo a punto de regalarla. Pero no quedó ahí la cosa: asustado quizás por lo que pudo ser, en la continuación de la jugada hizo una entrada infame a Prados justo cuando éste superaba la línea del área.',
            'foto' => 'images/coparey.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'laliga,futbol,copa,rey',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Los aspectos del juego que debe mejorar el Granada CF de José Ramón Sandoval',
            'descripcion' => 'La solidez defensiva, mayor presencia en el área o la estrategia son algunas facetas que el técnico madrileño tendrá que trabajar para revertir la situación en la que se encuentran los rojiblancos',
            'contenido' => 'El entorno del Granada CF, José Ramón Sandoval y la dirección de la entidad rojiblanca es consciente que la empresa que tiene el técnico madrileño es harta complicada. Con 30 puntos en juego y a trece de la permanencia, todo lo que sea llegar ‘vivo’ a final de temporada podría ser considerado como un milagro deportivo.

            Con la llegada del tercer entrenador del curso se busca darle un giro a la dinámica de un equipo con pie y medio en Segunda División. Pero Sandoval tiene mucho trabajo por delante para revertir la actual situación. Diez aspectos por mejorar que a esta altura de la campaña no serán fácil cambiarlos.
            Sin duda, ha sido el gran quebradero de cabeza tanto de Paco López como de Alexander Medina. El Granada CF es el equipo que más goles encaja de Primera División y eso que cuenta con partido menos. Nada menos que 58 veces en 28 encuentros ha visto perforada su portería. O lo que es lo mismo, tiene una media de 2,07 goles recibidos. Si no hay mejora defensiva, difícilmente se podrá soñar con recortar la diferencia con los equipos que le preceden en la tabla clasificatoria.
            A lo largo de la temporada ha quedado de manifiesto los problemas para dominar los partidos. En pocas ocasiones el centro del campo ha impuesto el ritmo que más se necesitaba. Con Sergio Ruiz como único fijo y con Gumbau de más a menos, las apariciones esporádicas de Gonzalo Villar en la construcción y la llegada de Martin Hongla no han mejorado una medular a la que le cuesta mucho conectar con los puntas y tener una circulación de balón continua.
            En equipos que pelean por no descender, se trata de unas facetas del juego más importantes porque habitualmente no generan tantas ocasiones de gol. Pero no sólo es importante en ataque sino también en defensa. Los últimos tantos encajados en saques de esquina en Villarreal y Mallorca dejan claro que se trata de un aspecto con un amplio margen de mejora. Exceptuando la cuarta y quinta jornada ante Real Sociedad y Girona, respectivamente, y el partido frente a Las Palmas con el gol de Bruno Méndez, el peligro que genera el Granada en la estrategia es escaso.
            Con la llegada de los diez fichajes, ha habido futbolistas, algunos de ellos veteranos, que han pasado a un papel secundario. Los Puertas, Callejón, Torrente o Melendo apenas juegan. Incluso incorporaciones como Faitout Maouassa, Corbeanu o Matías Arezo no tienen el protagonismo que se esperaba de ellos. Sandoval indicó en su presentación que quiere tener a toda la plantilla “metida” pero no será nada fácil dado el número de integrantes del plantel.
            En muy pocos partidos de la presente temporada el cuadro granadinista ha empleado la figura del media punta en el dibujo sobre el terreno de juego. En su anterior etapa en el Granada CF, el míster madrileño confió en Piti como enlace, intercambiado su posición con Rubén Rochina, con El Arabi como hombre más adelantado. El problema es que esa figura sólo la encarna en la actual plantilla Melendo y supondría relegar a Uzuni, el máximo goleador, a banda.
            Aunque no es una tarea técnica, lo cierto es que con el fichaje de Sandoval los máximos responsables del club han querido tratar de calmar los ánimos de una afición que cada vez tiene más claro que la gestión de Sophia Yang, Javier Aranguren y Alfredo García Amado deja mucho que desear. Difícilmente los seguidores van a dejar de quejarse en los partidos disputados en Los Cármenes en los cinco partidos que restan para concluir la temporada, porque el nuevo entrenador no tiene la culpa de la actual situación. Pero al menos, o eso creen, con la llegada del preparador de 55 años se ha buscado una figura querida con el objetivo de no mirar al palco. ¿Lo lograrán?',

            'foto' => 'images/sandoval.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'laliga,futbol,granada,descenso',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Hezonja hace líder al Real Madrid',
            'descripcion' => 'El ala-pívot anota 25 puntos en el triunfo sobre el Partizan que garantiza la primera plaza y el récord de victorias (25 por ahora) a los blancos',
            'contenido' => 'El Madrid no sabe de maldiciones o al menos no le importan. Por eso ató en Belgrado el liderato de la temporada regular en la Euroliga. Con el actual formato, nadie ha ganado el título desde esa primera plaza. Pero nadie había levantado tampoco un 0-2 en una eliminatoria de playoffs... Lo hicieron los blancos el año pasado frente al Partizan, precisamente su víctima este jueves (76-88). Llegan a las 25 victorias, igualando el tope. Hasta el momento, un curso europeo extraordinario por ahora.
            Quien hizo líder al Madrid fue principalmente Hezonja. Decisivo hace 48 horas en Berlín, dejó otra de esas actuaciones en las que muestra lo mejor de su repertorio. Puede que en el futuro los blancos las echen de menos. Acabó con 25 puntos, seis rebotes, cuatro asistencias y 33 de valoración.

            El croata anotó 10 puntos en el tercer periodo, cuando se rompió un choque hasta el momento terrible, con mucha igualdad y poco acierto: 13-13 al final del primer cuarto y 31-33 al descanso con pésimos porcentajes de ambos equipos (11/32 y 10/36, respectivamente, en tiros de campo y un 5/27 acumulado en triples).
            Ayudó mucho el despertar de Campazzo, que jugó cuatro minutos en la primera parte al estar tocado, pero hizo siete puntos y repartió tres asistencias en el parcial de 0-16 que liquidó el choque (54-68). Lo cerró Causeur, notable, con un robo tras saque de fondo.
            Hasta entonces se habían visto 18 cambios de líder y la máxima para cualquier equipo habían sido los cinco puntos del 5-0 inicial. Después, el Partizán se desintegró ante la subida de intensidad del Madrid y la dirección de Facu.
            Sin Sergio Rodríguez, sin Llull (también sin Rudy) y con Campazzo tocado, el Madrid solventó sus problemas en el puesto de base con algunos minutos de Alocén, otros de Abalde al timón y hasta Hezonja subió el balón en ocasiones. El chico sirve para todo.
            El Partizan, persiguiendo el play-in, necesita más que un ambiente infernal. Faltó Leday y Kaminsky fue el mejor (19 puntos). Tuvo un bello duelo anotador con Hezonja en el tercer acto. Con el partido ya muy cuesta arriba apareció Punter. Poco para tratar de detener al líder, que tendrá que superar una maldición si quiere repetir título.
            ',
            'foto' => 'images/hezonja.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,deporte,baloncesto,tenis,partido,entrenador',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Martín Landaluce, estudiante modélico de día y promesa del tenis por la tarde',
            'descripcion' => 'El joven español desvela sus curiosas rutinas como estudiante de último año en el instituto tras romper moldes en el Miami Open 2024.',
            'contenido' => 'Una tarde-noche que jamás podrá olvidar. Eso es lo que vivió Martín Landaluce este pasado jueves en el Miami Open 2024, obteniendo su primer triunfo ATP y mostrando al mundo sus credenciales de gran jugador en ciernes. Después de ganar a Jaume Munar, ofreció unas curiosas declaraciones en las que desvela cómo compagina sus estudios con el tenis profesional.

            "Este chico es bueno eh". Mensajes de este estilo llegaban a mi teléfono móvil apenas unos minutos después de que Martín Landaluce comenzara su partido del Miami Open 2024 frente al siempre aguerrido Jaume Munar. Llevo mucho tiempo insistiendo a mi entorno de la valía de un jugador al que sigo de cerca y con el que permanezco asombrado por su espectacular progresión. La victoria terminó cayendo de su lado y, con ello, la sensación de que algo grande puede estar gestándose.
            
            Vi a Martín en varias ocasiones cuando era júnior y me asombró su perfecta conjunción entre potencia y agilidad, su vocación ofensiva y cómo gestionaba las situaciones límite. Confirmó su valía con el título en el US Open 2022 Junior, pero la aventura del salto al profesionalismo no se intuía sencilla. Procede de una familia de tenis, que conoce bien los entresijos de este deporte y que ha criado a dos hermanos de Martín, Alejandra y Lucas, que obtuvieron becas en universidades estadounidenses merced a su talento. No pasará por ahí Martín ya que en apenas un año, ha salvado la brecha a nivel físico, mental y tenístico que le impidió competir con garantías en 2023 en el circuito profesional.
            
            La decisión de irse a entrenar a la Rafa Nadal Academy by Movistar manteniendo a Óscar Burrieza como entrenador principal y sumando otros técnicos, como Gustavo Marcaccio y Esteban Carril, de dilatada experiencia con nombres como Konta, han dado un impulso a la carrera de un chico gestionado por IMG, con Albert Molina al frente, agente de Alcaraz también, y teniendo su padre mucho peso en las decisiones que se toman. Landaluce es un trabajador nato, un apasionado del tenis que sueña a lo grande y tiene motivos para hacerlo, pero que mantiene los pies en la tierra.
            
            - Martín Landaluce consigue ser el primer jugador nacido en 2006 que gana un partido de Masters 1000
            
            "Estoy en semana de exámenes finales, este es mi último año de instituto y dedico muchas horas a estudiar. Luego tengo los exámenes a primera hora de la mañana aquí, en Miami, entre 07:30 y 08:00 am, con exámenes que duran una hora y media. Después toca entrenar, preparar la competición y, por la tarde, sacar tiempo para dar alguna clase", contaba Landaluce en palabras recogidas por atptour.com
            
            No hay que tener prisa con este chico. Por muy prometedor que sea lo que vemos, sus características como jugador requieren tiempo, paciencia y mucho trabajo. Algunos aseveran que su estilo recuerda al de Zverev, pero lo cierto es que Martín quiere marcar su propio camino, siendo un tenista agresivo, de movilidad prodigiosa para sus 191 centímetros de estatura y con buenas habilidades a media pista. Quizá lo que más destaca de él es su actitud positiva en cancha.
            
            "Ha sido una batalla conmigo mismo. Después de ganar el primer set tuve muchos nervios, es como si me sintiera fuera de mi cuerpo, era una especie de fantasma. La visita al baño después de ese parcial me vino bien. Suelo hablar conmigo mismo en voz alta, mandarme mensajes positivos", advierte un joven que estuvo acompañado por toda su familia y que busca ahora prolongar su sueño.
            
            - Su próximo reto en el Miami Open 2024 será Ben Shelton
            
            Por delante tiene una bonita batalla ante Ben Shelton, su primera gran prueba de fuego en esta nueva etapa de su carrera. Competirá en una cancha importante, ante un jugador local que ya sabe lo que es disputar unas semifinales de Grand Slam y debe enfocar el partido sabiendo que no tiene nada que perder. "Voy a intentar aprender lo máximo posible de este encuentro", señaló una de las grandes revelaciones del Miami Open 2024. Toca seguir disfrutando con Martín Landaluce y soñando con lo que puede llegar a hacer a medio plazo.
            ',
            'foto' => 'images/landaluce.png',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,deporte,baloncesto,tenis,partido,entrenador',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Alcaraz y una significativa racha de permanencia en el top-2 del ranking ATP',
            'descripcion' => 'El español acumula ya 80 semanas consecutivas entre los dos mejores del ranking ATP, situándose entre las mejores marcas de la historia.',
            'contenido' => 'Mantenerse en la cima no es nada sencillo y menos aún con 20 años, pero Carlos Alcaraz no ha abandonado el top-2 del ranking ATP desde que se situó como número 1 después de ganar el US Open 2022. Atesora ya 13ª mejor marca de todos los tiempos en cuanto a semanas consecutivas entre los dos primeros puestos y quiere seguir ampliándola.

            Hay ocasiones en que no nos damos cuenta de la grandeza que tenemos ante nuestros ojos y normalizamos cosas que son auténticos hitos históricos. Una de ellas es lo que está haciendo Carlos Alcaraz en estos primeros compases de su carrera y las sensaciones de solvencia que transmite. Para reflejarlo, hay un dato muy interesante que proporciona MisterOnlyTennis, como es el que hace referencia a las semanas consecutivas como top-2 del ranking ATP.
            
            - Alcaraz es el 13º jugador de la historia que firma 80 semanas consecutivas entre los dos mejores del mundo
            
            Quizá muchos ya no recuerden el momento en que Carlitos no figuraba en uno de los dos primeros puestos de la clasificación, y no es de extrañar porque Alcaraz permanece ahí desde que se proclamó campeón del US Open 2022. Su primer título de Grand Slam vino acompañado con el ascenso al número 1 del mundo, del que se vio desplazado por Djokovic hasta en dos ocasiones durante el 2023. En Indian Wells 2024 planeó la sombra de un sorpasso por parte de Jannik Sinner, pero el murciano aguantó el tirón y se ha consolidado en el segundo puesto, mientras mira ya con optimismo la posibilidad de volver al número 1.
            
            Lo cierto es que este 19 de marzo, Alcaraz arrancó su 80ª semana consecutiva entre los dos mejores del mundo, algo nada desdeñable y cuyo mérito conviene poner de relieve analizando la lista histórica de jugadores que firmaron rachas similares. El español es el 13º jugador que llega a ese límite de las 80 semanas, de las cuales 36 han sido como número 1 del mundo y 44 como número 2. Quien lidera la lista es Roger Federer, con la friolera de 346 semanas seguidas atesorando ese privilegio, pero Alcaraz tiene cerca a otros jugadores importantes a los que podría rebasar pronto.
            
            - ¿Qué necesita Alcaraz para salir del Miami Open 2024 en el top-2 del ranking ATP?
            
            No va a ser nada sencillo aguantar a largo plazo el empuje de Jannik Sinner y también de Daniil Medvedev, ávidos por seguir sumando puntos que les hagan escalar posiciones. Es cierto que, por muchos puntos que defienda Carlos en la gira sobre tierra batida, su superioridad en dicha superficie sobre el italiano y el ruso es notable, por lo que si llega con cierto margen y logra eludir la presión de Sinner en este Miami Open 2024, puede tener más sencillo acumular semanas en el top-2 y soñar con recuperar el número 1.
            
            El italiano es el único que puede sacar a Carlitos del top-2 del ranking ATP durante este Miami Open 2024. Para ello, necesita ganar el torneo y que Alcaraz no llegue a semifinales, siendo éste el único escenario en el que se produciría la alternancia de posiciones y la racha del español se vería interrumpida. Así pues, el joven tenista murciano depende de sí mismo para mantenerse en el segundo puesto, algo que conseguiría si llega a semifinales. En caso de ganar el torneo, se situaría a tan solo 280 puntos del número 1, en manos de Djokovic.
            
            - Estos son los tenistas con más semanas consecutivas en el top-2 del ranking ATP en toda la historia
            
            Roger Federer: 346 semanas
            Novak Djokovic: 325 semanas
            Jimmy Connors: 282 semanas
            Ivan Lendl: 280 semanas
            Rafael Nadal: 212 semanas
            Pete Sampras: 173 semanas
            Björn Borg: 170 semanas
            John McEnroe: 158 semanas
            Stefan Edberg: 117 semanas
            Jim Courier: 107 semanas
            Lleyton Hewitt: 87 semanas
            John Newcombe: 82 semanas
            Carlos Alcaraz: 80 semanas',
            'foto' => 'images/alcaraz.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,deporte,baloncesto,tenis,partido,entrenador',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);




        Noticia::create([
            'titulo' => 'La transformación digital: clave para la competitividad de las empresas españolas',
            'descripcion' => 'La transformación digital es un proceso imparable que está redefiniendo todos los sectores de la economía. Las empresas españolas que no se adapten a esta nueva realidad corren el riesgo de quedarse atrás en un mercado cada vez más competitivo.',
            'contenido' => 'a transformación digital es un proceso imparable que está redefiniendo todos los sectores de la economía. Las empresas españolas que no se adapten a esta nueva realidad corren el riesgo de quedarse atrás en un mercado cada vez más competitivo.
            La digitalización de los procesos permite a las empresas ahorrar tiempo y costes, mejorar la calidad de sus productos y servicios, crear nuevos modelos de negocio y llegar a nuevos clientes. En definitiva, las empresas que se digitalizan son más competitivas en el mercado global.
            Sin embargo, la transformación digital también presenta algunos retos. La falta de inversión, la escasez de talento digital y la resistencia al cambio cultural son algunos de los principales obstáculos que las empresas deben superar.
            Para tener éxito en la transformación digital, es necesario definir una estrategia clara que se alinee con los objetivos de la empresa, contar con un liderazgo comprometido, crear una cultura de innovación y formación, e invertir en la formación de los empleados.
            La transformación digital es clave para el futuro de la economía española. Las empresas que se adapten a esta nueva realidad estarán mejor posicionadas para competir en el mercado global y contribuir al crecimiento económico del país.
            El gobierno español tiene un papel importante que jugar en la promoción de la transformación digital de las empresas. Es necesario crear un marco regulatorio favorable a la innovación, facilitar el acceso a la financiación y a la formación, y fomentar la colaboración entre las empresas, el gobierno y la sociedad civil.
            En definitiva, la transformación digital es una oportunidad para que las empresas españolas sean más competitivas en el mercado global. Es un esfuerzo que requiere la colaboración de todos los actores para que España aproveche al máximo esta oportunidad.',
            'foto' => 'images/digital.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Los bancos centrales endurecen su política monetaria para combatir la inflación',
            'descripcion' => 'Subida de tipos de interés, reducción de la compra de activos y control de la inflación: las medidas que están tomando los bancos centrales para contener la subida de precios',
            'contenido' => 'Los bancos centrales de todo el mundo están endureciendo su política monetaria en un intento de contener la inflación. La Reserva Federal de Estados Unidos (Fed), el Banco Central Europeo (BCE) y el Banco de Inglaterra (BoE) han anunciado subidas de los tipos de interés, mientras que otros bancos centrales, como el Banco de Japón (BoJ), están empezando a reducir sus programas de compra de activos.
            Controlar la inflación: La principal razón del endurecimiento monetario es la necesidad de controlar la inflación, que se encuentra en niveles muy altos en la mayoría de las economías desarrolladas.
            Evitar una espiral inflacionaria: Los bancos centrales temen que la inflación se descontrole y se convierta en una espiral inflacionaria, lo que sería muy negativo para la economía.
            Anclar las expectativas de inflación: Los bancos centrales también quieren anclar las expectativas de inflación, es decir, que los agentes económicos esperen que la inflación se mantenga en niveles controlados en el futuro.
            Subida de tipos de interés: La medida más común que están tomando los bancos centrales es la subida de los tipos de interés. Esto encarece el crédito y reduce la demanda agregada, lo que a su vez ayuda a contener la inflación.
            Reducción de la compra de activos: Los bancos centrales también están reduciendo sus programas de compra de activos, que habían puesto en marcha durante la pandemia para estimular la economía.
            Control de la curva de tipos: Algunos bancos centrales, como la Fed, también están utilizando herramientas de control de la curva de tipos para mantener los tipos de interés a largo plazo en niveles bajos.
            El endurecimiento monetario también tiene algunos riesgos. Una subida de los tipos de interés puede ralentizar el crecimiento económico e incluso provocar una recesión. Además, el endurecimiento monetario puede tener un impacto negativo en los mercados financieros. 
            El endurecimiento monetario ya está empezando a tener algunos efectos en la economía. Los tipos de interés a largo plazo han subido y el crecimiento económico se ha ralentizado en algunos países. Sin embargo, todavía es pronto para saber si el endurecimiento monetario será suficiente para contener la inflación sin provocar una recesión.
            En definitiva, los bancos centrales están tomando medidas para contener la inflación, pero estas medidas también tienen algunos riesgos. Es importante que los bancos centrales calibres cuidadosamente su política monetaria para evitar una recesión.',
            'foto' => 'images/banco.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El paro registrado en España baja en febrero por quinto mes consecutivo',
            'descripcion' => 'l paro registrado en España ha bajado en febrero por quinto mes consecutivo, situándose en 2,89 millones de personas. La tasa de paro se ha reducido al 12,6%, la más baja desde 2008.',
            'contenido' => 'El Ministerio de Trabajo y Economía Social ha publicado este martes los datos del paro correspondientes al mes de febrero, que muestran una nueva caída del desempleo en España. En concreto, el paro registrado se ha reducido en 70.744 personas en el último mes, lo que supone un descenso del 2,4%.
            Esta bajada del paro se ha producido en todos los sectores de actividad, con especial incidencia en el sector servicios, que ha registrado una reducción del desempleo del 3,1%. También se ha producido una bajada significativa del paro en la agricultura (-2,8%) y en la industria (-2,2%).
            La tasa de paro se ha situado en el 12,6%, lo que supone una décima menos que en el mes anterior y la tasa más baja desde abril de 2008. La tasa de paro entre los jóvenes también ha bajado, situándose en el 32,2%.
            El número de afiliados a la Seguridad Social también ha aumentado en febrero, en 204.344 personas, lo que supone un crecimiento del 1,1%. El número total de afiliados se sitúa ya en 19.224.112 personas.
            La buena evolución del mercado laboral español se produce en un contexto de recuperación económica tras la pandemia de COVID-19. El crecimiento del PIB en 2022 fue del 5,5%, y se espera que siga creciendo en 2023.
            La bajada del paro y el aumento de la afiliación a la Seguridad Social son buenas noticias para la economía española. Estas cifras indican que la recuperación económica está creando empleo y que el mercado laboral español está mejorando.
            A pesar de la buena evolución del mercado laboral, todavía hay algunos retos que afrontar. Uno de los principales retos es la alta tasa de paro juvenil.
            Se espera que el mercado laboral español siga mejorando en los próximos meses. El Gobierno español ha puesto en marcha una serie de medidas para fomentar la creación de empleo, como la reforma laboral y el plan de recuperación económica.
            La bajada del paro en febrero es una buena noticia para la economía española. Es un indicador de que la recuperación económica está en marcha y que el mercado laboral está mejorando. Sin embargo, todavía hay algunos retos que afrontar, como la alta tasa de paro juvenil.',
            'foto' => 'images/paro.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'La Reserva Federal de EE.UU. sube los tipos de interés 0,25 puntos, anticipando nuevas subidas',
            'descripcion' => 'La Reserva Federal de EE.UU. ha elevado los tipos de interés en 0,25 puntos, la primera subida desde 2018. Se espera que otros bancos centrales, como el Banco Central Europeo (BCE), tomen medidas similares en los próximos meses para combatir la inflación.',
            'contenido' => 'La Reserva Federal de EE.UU. ha decidido subir los tipos de interés en un 0,25%, la primera subida desde diciembre de 2018. La decisión se ha tomado en un contexto de elevada inflación en EE.UU., que se situó en el 7,5% en febrero.
            Se espera que otros bancos centrales, como el Banco Central Europeo (BCE), tomen medidas similares en los próximos meses. El BCE ha anunciado que comenzará a reducir su programa de compra de activos en marzo, lo que podría ser un primer paso hacia la subida de los tipos de interés.
            La subida de los tipos de interés tiene como objetivo combatir la inflación. Los bancos centrales consideran que la inflación es demasiado alta y que es necesario tomar medidas para controlarla.
            La subida de los tipos de interés tendrá un impacto en la economía global. Se espera que frene el crecimiento económico, pero también podría ayudar a contener la inflación. Los bancos centrales están tratando de encontrar un equilibrio entre el crecimiento económico y la estabilidad de precios.
            Se espera que los bancos centrales continúen subiendo los tipos de interés en los próximos meses. El ritmo de las subidas dependerá de la evolución de la inflación.
            La subida de los tipos de interés tendrá un impacto en los hogares y las empresas. Los hogares tendrán que pagar más por sus hipotecas y préstamos, y las empresas tendrán que pagar más por sus créditos.
            Existe un debate sobre si la subida de los tipos de interés es la mejor manera de combatir la inflación. Algunos economistas consideran que la subida de los tipos de interés podría ser contraproducente y podría frenar el crecimiento económico.
            La subida de los tipos de interés es una medida importante que tendrá un impacto en la economía global. Es importante que los bancos centrales sean prudentes y que monitoricen la evolución de la inflación para tomar las medidas adecuadas.',
            'foto' => 'images/tipo.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'La inflación en España se dispara al 6,0% en enero, la tasa más alta desde 1992',
            'descripcion' => 'El Índice de Precios al Consumidor (IPC) de enero en España se ha situado en el 6,0%, una tasa interanual que supone la más alta desde diciembre de 1992. La energía sigue siendo el principal componente del alza de precios, con una subida del 29,3%.',
            'contenido' => 'El dato del IPC de enero en España confirma la tendencia al alza de la inflación en los últimos meses. La tasa de inflación se ha duplicado en el último año, pasando del 3,0% en enero de 2022 al 6,0% en enero de 2023.
            La energía es el principal factor que impulsa la inflación, con una subida del 29,3% en enero. Los alimentos también experimentaron un alza significativa, con un aumento del 5,5%.
            El resto de los componentes del IPC también registraron subidas, aunque en menor medida. Los precios de los bienes no energéticos subieron un 2,4%, mientras que los precios de los servicios subieron un 2,1%.
            La elevada inflación está teniendo un impacto negativo en el poder adquisitivo de los hogares españoles. El gobierno ha implementado algunas medidas para paliar sus efectos, como la bonificación de 20 céntimos por litro de combustible, pero los expertos consideran que se necesitan medidas adicionales.
            Se espera que la inflación se mantenga en niveles altos en los próximos meses, aunque es probable que comience a moderarse a partir de la segunda mitad del año. El Banco Central Europeo (BCE) ha anunciado que subirá los tipos de interés en julio, lo que podría ayudar a contener la inflación.
            El gobierno español ha implementado algunas medidas para paliar los efectos de la inflación, como la bonificación de 20 céntimos por litro de combustible, la ampliación del bono social eléctrico y la subida del Salario Mínimo Interprofesional (SMI).
            Las reacciones a la subida del IPC han sido variadas. Los sindicatos han pedido medidas más contundentes para proteger a los trabajadores, mientras que las empresas han advertido que la subida de los precios podría afectar a la competitividad de la economía española.',
            'foto' => 'images/inflacion.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);




        Noticia::create([
            'titulo' => 'Nueva tecnología de realidad aumentada revoluciona la experiencia de compra en línea',
            'descripcion' => 'Una innovadora tecnología de realidad aumentada está cambiando la forma en que las personas compran en línea, ofreciendo una experiencia de compra más inmersiva y personalizada. ',
            'contenido' => 'La realidad aumentada (RA) está transformando la industria del comercio electrónico al brindar una experiencia de compra completamente nueva y envolvente. Esta tecnología permite a los usuarios visualizar productos en su entorno real a través de dispositivos como teléfonos inteligentes y tabletas, utilizando la cámara para superponer imágenes virtuales sobre el mundo físico.
            Una de las aplicaciones más impactantes de la realidad aumentada en el comercio electrónico es la capacidad de "probar" productos antes de comprarlos. Por ejemplo, los consumidores pueden ver cómo se vería un mueble en su sala de estar, cómo quedaría un par de gafas de sol en su rostro, o incluso cómo se vería un nuevo color de pintura en sus paredes. Esta experiencia inmersiva no solo ayuda a los clientes a tomar decisiones más informadas, sino que también aumenta la confianza en sus compras, lo que reduce las devoluciones y aumenta la satisfacción del cliente.
            Además de mejorar la experiencia de compra para los consumidores, la realidad aumentada también beneficia a los minoristas al aumentar las tasas de conversión y las ventas. Al ofrecer una vista previa virtual de los productos, las marcas pueden atraer y retener a los clientes de manera más efectiva, convirtiendo las visitas a sus sitios web en transacciones exitosas. Esto se traduce en un aumento en los ingresos y una mayor fidelidad del cliente a largo plazo.
            A medida que la tecnología de realidad aumentada continúa mejorando y volviéndose más accesible, se espera que su adopción en el comercio electrónico siga creciendo. Los minoristas que inviertan en esta innovadora tecnología estarán mejor posicionados para destacarse en un mercado cada vez más competitivo y brindar experiencias de compra excepcionales a sus clientes.',
            'foto' => 'images/real.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Desarrollan nueva tecnología de inteligencia artificial para detectar enfermedades cardíacas',
            'descripcion' => 'Un equipo de investigadores ha desarrollado una innovadora tecnología de inteligencia artificial capaz de diagnosticar enfermedades cardíacas con una precisión sin precedentes. Esta noticia explora cómo esta tecnología podría revolucionar el diagnóstico y tratamiento de enfermedades cardiovasculares en el futuro cercano.',
            'contenido' => 'La enfermedad cardiovascular es una de las principales causas de muerte en todo el mundo, y su detección temprana es crucial para un tratamiento efectivo y una mejor atención al paciente. En este contexto, los avances en inteligencia artificial están demostrando ser herramientas prometedoras para mejorar el diagnóstico y la prevención de enfermedades cardíacas.
            El equipo de investigadores ha desarrollado un algoritmo de inteligencia artificial entrenado con miles de imágenes médicas de ecocardiogramas, resonancias magnéticas y otras pruebas cardíacas. Este algoritmo utiliza técnicas de aprendizaje profundo para analizar las imágenes y detectar patrones sutiles asociados con diversas enfermedades cardíacas, incluyendo la enfermedad coronaria, la insuficiencia cardíaca y las anomalías estructurales del corazón.
            Lo más destacado de esta tecnología es su capacidad para identificar anomalías cardiacas con una precisión y rapidez excepcionales, superando incluso a los expertos médicos en algunos casos. Además, la tecnología es no invasiva y puede integrarse fácilmente en la práctica clínica existente, lo que la hace accesible para un amplio espectro de profesionales de la salud y pacientes.
            Se espera que esta nueva tecnología de inteligencia artificial tenga un impacto significativo en el campo de la cardiología al mejorar la detección temprana de enfermedades cardíacas, permitiendo tratamientos más efectivos y personalizados, y reduciendo la carga sobre los sistemas de salud. Además, abre nuevas oportunidades para la investigación en el campo de la medicina cardiovascular y promueve la colaboración entre científicos, médicos y expertos en inteligencia artificial.
            En resumen, el desarrollo de esta tecnología de inteligencia artificial marca un hito importante en el campo de la salud cardiovascular y ejemplifica el potencial transformador de la inteligencia artificial en el diagnóstico y tratamiento de enfermedades críticas. Con el tiempo, se espera que estas innovaciones mejoren significativamente la calidad de vida de millones de personas en todo el mundo.',
            'foto' => 'images/ia.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Google anuncia avances en la tecnología de realidad aumentada para facilitar la navegación urbana',
            'descripcion' => 'Google ha revelado nuevos avances en su tecnología de realidad aumentada, destinados a mejorar la experiencia de navegación urbana para los usuarios de Google Maps. Esta noticia destaca cómo la realidad aumentada está siendo utilizada para proporcionar indicaciones más precisas y visuales mientras se navega por entornos urbanos complejos.',
            'contenido' => 'La navegación en entornos urbanos puede ser desafiante, con calles congestionadas, edificios altos y múltiples puntos de referencia que pueden confundir a los usuarios. En respuesta a estos desafíos, Google ha estado desarrollando su tecnología de realidad aumentada para ofrecer una experiencia de navegación más intuitiva y precisa.
            La última actualización de Google Maps presenta una función de realidad aumentada mejorada que utiliza la cámara del teléfono inteligente del usuario para superponer indicaciones visuales en tiempo real sobre el mundo real. Al apuntar la cámara hacia adelante, los usuarios pueden ver señales digitales superpuestas en la pantalla que indican direcciones, giros y destinos, lo que facilita la orientación y la toma de decisiones durante la navegación.
            Esta tecnología utiliza algoritmos avanzados de visión por computadora y mapeo 3D para identificar con precisión la ubicación del usuario y los elementos circundantes en el entorno urbano. Además, se integra con datos en tiempo real de Google Maps, lo que permite a los usuarios recibir actualizaciones sobre el tráfico, la construcción de carreteras y otros eventos relevantes mientras navegan por la ciudad.
            La realidad aumentada se ha convertido en una herramienta valiosa para mejorar la experiencia de navegación, especialmente en entornos urbanos densos y complejos. Al proporcionar indicaciones visuales claras y contextualizadas, esta tecnología ayuda a los usuarios a tomar decisiones más informadas y a llegar a su destino de manera más eficiente.
            Google continúa invirtiendo en el desarrollo de la realidad aumentada y su integración en productos como Google Maps, con el objetivo de ofrecer una experiencia de navegación más intuitiva y personalizada para millones de usuarios en todo el mundo. Este avance marca un paso significativo hacia el futuro de la navegación urbana y demuestra el potencial transformador de la realidad aumentada en nuestra vida diaria.',
            'foto' => 'images/google.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Tesla anuncia avances en su tecnología de conducción autónoma con la introducción de Tesla Vision',
            'descripcion' => 'Tesla ha dado un paso adelante en su búsqueda de la conducción autónoma al anunciar Tesla Vision, una nueva tecnología de visión por computadora diseñada para mejorar la seguridad y la eficiencia de sus vehículos eléctricos. Esta noticia destaca cómo Tesla está avanzando hacia un futuro de conducción totalmente autónoma mediante el desarrollo de sistemas de percepción visual más sofisticados.',
            'contenido' => 'La visión por computadora desempeña un papel fundamental en el desarrollo de vehículos autónomos, permitiendo que los sistemas de conducción interpreten y comprendan su entorno circundante de manera similar a como lo haría un conductor humano. Tesla ha estado a la vanguardia de la tecnología de conducción autónoma, y su último avance, Tesla Vision, promete llevar esta capacidad un paso más allá.
            Tesla Vision es una solución de visión por computadora basada en redes neuronales que utiliza cámaras integradas en los vehículos Tesla para capturar y procesar imágenes en tiempo real del entorno circundante. Estas cámaras, ubicadas estratégicamente en diferentes partes del automóvil, permiten una visión de 360 grados que abarca tanto la carretera como los objetos y peatones cercanos.
            Lo que distingue a Tesla Vision es su capacidad para prescindir de los sensores LiDAR tradicionales, que utilizan láseres para mapear el entorno en 3D. En su lugar, Tesla confía en la inteligencia artificial y el aprendizaje automático para interpretar y analizar datos visuales, lo que permite una conducción autónoma más precisa y eficiente.
            Al eliminar la dependencia de los costosos sensores LiDAR, Tesla puede reducir significativamente el costo de producción de sus vehículos autónomos, lo que los hace más accesibles para los consumidores. Además, al confiar en la visión por computadora, Tesla puede mejorar la robustez y la fiabilidad de sus sistemas de conducción autónoma en una variedad de condiciones climáticas y de iluminación.
            Tesla Vision representa un paso importante hacia el objetivo final de Tesla de lograr la conducción completamente autónoma. Si bien aún queda trabajo por hacer para perfeccionar esta tecnología y superar los desafíos regulatorios y de seguridad, su introducción marca un hito significativo en el camino hacia un futuro de transporte más seguro, eficiente y sostenible.',
            'foto' => 'images/tesla.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Google presenta su nuevo chip Tensor para potenciar la inteligencia artificial en dispositivos móviles',
            'descripcion' => 'Google ha revelado su último avance en tecnología de inteligencia artificial con el lanzamiento del chip Tensor, diseñado específicamente para impulsar el rendimiento de la IA en dispositivos móviles.',
            'contenido' => 'El chip Tensor de Google marca un hito significativo en la evolución de la inteligencia artificial en dispositivos móviles. Diseñado internamente por los ingenieros de Google, este chip ofrece un rendimiento excepcional en tareas de aprendizaje automático y procesamiento de datos, lo que permite una amplia gama de aplicaciones innovadoras en dispositivos portátiles.
            Una de las características más destacadas del chip Tensor es su capacidad para ejecutar modelos de inteligencia artificial directamente en el dispositivo, sin necesidad de depender de una conexión a la nube. Esto significa que los dispositivos equipados con el chip Tensor pueden realizar tareas de IA de manera más rápida y eficiente, incluso cuando están fuera de línea o tienen una conexión de datos limitada.
            El chip Tensor está optimizado para una variedad de aplicaciones de inteligencia artificial, desde reconocimiento de voz y traducción en tiempo real hasta análisis de imágenes y asistencia personalizada. Con su arquitectura altamente eficiente y su capacidad para procesar grandes volúmenes de datos en tiempo real, el chip Tensor proporciona una experiencia de usuario más fluida y receptiva en dispositivos móviles.
            Google ha anunciado que el chip Tensor debutará en su próxima línea de teléfonos inteligentes Pixel, pero también tiene planes de llevar esta tecnología a otros dispositivos, como tabletas, dispositivos portátiles y dispositivos domésticos inteligentes. Al integrar capacidades avanzadas de inteligencia artificial en una amplia gama de productos, Google busca mejorar la vida cotidiana de las personas y proporcionar soluciones innovadoras a los desafíos del mundo real.',
            'foto' => 'images/tensor.jpeg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);





        Noticia::create([
            'titulo' => 'Nueva exposición de arte contemporáneo en el Museo de Arte Moderno de Nueva York',
            'descripcion' => 'El Museo de Arte Moderno de Nueva York ha inaugurado una emocionante exposición que presenta obras de algunos de los artistas contemporáneos más innovadores del mundo.',
            'contenido' => 'La exposición "Vanguardia en el Siglo XXI" ha llegado al Museo de Arte Moderno de Nueva York con un despliegue de creatividad y expresión que ha cautivado a críticos de arte y visitantes por igual. Este evento, que marca un hito en la escena cultural de la ciudad, reúne una colección ecléctica de obras que desafían las convenciones y exploran nuevas fronteras en el arte contemporáneo.
            Desde pinturas abstractas hasta instalaciones multimedia, la exposición ofrece una amplia gama de estilos y técnicas que reflejan la diversidad y la vitalidad del panorama artístico actual. Los visitantes pueden sumergirse en un mundo de colores vibrantes, formas intrincadas y narrativas provocativas mientras recorren las galerías del museo.
            Entre las obras destacadas se encuentran piezas de artistas emergentes que están dando forma al futuro del arte contemporáneo, junto con obras icónicas de figuras establecidas en la escena artística mundial. Los temas explorados son igualmente diversos, desde reflexiones sobre la identidad y la cultura hasta exploraciones de la tecnología y el medio ambiente.
            La exposición no solo celebra la creatividad individual de cada artista, sino que también destaca las conexiones y diálogos entre las obras expuestas. Los visitantes son invitados a reflexionar sobre las intersecciones entre diferentes estilos y corrientes artísticas, así como a considerar el papel del arte en la sociedad contemporánea.
            Además de las obras en exhibición, la exposición también incluye una serie de eventos complementarios, como charlas de artistas, visitas guiadas y talleres interactivos. Estas actividades ofrecen a los visitantes la oportunidad de involucrarse más profundamente con el arte y ampliar su comprensión de las obras y los procesos creativos detrás de ellas.
            "Vanguardia en el Siglo XXI" estará abierta al público durante los próximos tres meses, brindando a los amantes del arte la oportunidad de explorar nuevas perspectivas y reflexionar sobre el papel del arte en el mundo moderno. La exposición promete ser un punto culminante en el calendario cultural de la ciudad de Nueva York y una experiencia imperdible para todos los aficionados al arte.
            Este contenido más extenso ofrece una visión más detallada y envolvente de la exposición de arte contemporáneo, brindando al lector una experiencia más inmersiva y enriquecedora.',
            'foto' => 'images/museo.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);
        
        Noticia::create([
            'titulo' => 'Descubren una nueva obra perdida de un maestro renacentista en una mansión italiana',
            'descripcion' => 'En una emocionante revelación para el mundo del arte, arqueólogos italianos han descubierto una pintura perdida del renombrado maestro renacentista Leonardo da Vinci en una antigua mansión en el corazón de Florencia.',
            'contenido' => 'El mundo del arte está abuzz con la noticia del descubrimiento de una pintura perdida que se cree que es obra del legendario Leonardo da Vinci. El emocionante hallazgo se produjo durante una excavación arqueológica en una histórica mansión en las afueras de Florencia, Italia.
            Los arqueólogos, que estaban investigando los restos de la mansión, quedaron asombrados al descubrir una habitación secreta oculta detrás de una pared de yeso. En el interior, entre una colección de artefactos antiguos y polvo acumulado, encontraron una pintura cubierta de suciedad y desgaste, pero claramente identificable como una obra del genio renacentista.
            La pintura, que muestra una figura misteriosa en un paisaje bucólico, presenta la firma característica de Leonardo da Vinci en la esquina inferior derecha. Los expertos están emocionados por la posibilidad de que esta sea una obra previamente desconocida del maestro italiano, cuya obra ya es venerada en todo el mundo.
            Los análisis preliminares de la pintura y los materiales utilizados sugieren que la obra data del siglo XVI y coincide con el período en que Leonardo da Vinci estaba activo en la región de Florencia. Sin embargo, se necesitarán análisis más detallados y pruebas científicas para confirmar definitivamente la autenticidad de la obra.
            El descubrimiento ha generado un gran interés tanto en la comunidad artística como en el público en general, con muchas personas ansiosas por ver la pintura y aprender más sobre su origen y significado. La posibilidad de añadir una nueva obra maestra de Leonardo da Vinci al canon del arte renacentista ha provocado un renovado entusiasmo por el legado del famoso pintor y científico.
            Los arqueólogos y expertos en arte continúan trabajando para investigar la historia de la mansión y descubrir cómo esta pintura perdida llegó a estar oculta durante siglos. Mientras tanto, la expectación y la emoción en torno al descubrimiento siguen creciendo, con la esperanza de que esta obra pueda arrojar nueva luz sobre la vida y el trabajo de uno de los artistas más influyentes de la historia.
            Este emocionante descubrimiento nos recuerda la capacidad duradera del arte para sorprendernos y cautivarnos, incluso siglos después de haber sido creado. La posibilidad de descubrir una nueva obra de un maestro como Leonardo da Vinci es un recordatorio de la importancia de preservar y explorar nuestro patrimonio cultural para las generaciones futuras.',
            'foto' => 'images/obra.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Instalación de una monumental escultura contemporánea en el centro de Londres sorprende a los transeúntes',
            'descripcion' => 'Una imponente escultura de arte contemporáneo, titulada "Reflexiones Urbanas", ha sido erigida en el corazón de Londres, generando sorpresa y admiración entre los residentes y visitantes de la ciudad.',
            'contenido' => 'En un giro inesperado, el paisaje urbano de Londres ha sido transformado por la reciente instalación de una escultura contemporánea de proporciones monumentales. La obra, titulada "Reflexiones Urbanas", es una creación del aclamado artista británico David Smith y ha sido colocada en un lugar destacado en el centro de la ciudad.
            La escultura, que se eleva majestuosamente sobre el pavimento, presenta una composición abstracta de formas geométricas y líneas fluidas que evocan la energía y el movimiento de la vida urbana. Construida en acero corten, la obra destaca por su imponente presencia y su capacidad para interactuar con su entorno circundante.
            Desde su instalación, "Reflexiones Urbanas" ha atraído la atención de los transeúntes y ha generado un intenso debate en la comunidad artística y en la opinión pública. Algunos elogian la audacia y la innovación de la escultura, mientras que otros expresan reservas sobre su idoneidad para el entorno urbano.
            La obra de Smith se ha convertido rápidamente en un punto focal en el paisaje urbano de Londres, atrayendo a numerosos curiosos que se detienen a contemplar su impactante presencia. La escultura también ha generado interés en las redes sociales, donde las imágenes y opiniones sobre la obra se han compartido ampliamente.
            El artista, David Smith, ha expresado su esperanza de que "Reflexiones Urbanas" sirva como una invitación a la reflexión sobre la relación entre el arte y el espacio público, y como una celebración de la diversidad y vitalidad de la vida urbana. La escultura está programada para permanecer en su ubicación actual durante varios meses, durante los cuales se espera que continúe inspirando y provocando la imaginación de quienes la contemplen.
            El impacto de "Reflexiones Urbanas" en el centro de Londres subraya el poder del arte para transformar y enriquecer nuestro entorno cotidiano, así como la importancia de fomentar la creatividad y la innovación en el ámbito público. A medida que la escultura se convierte en parte integral del tejido urbano de la ciudad, queda claro que el arte contemporáneo sigue siendo una fuerza vibrante y relevante en el mundo moderno.',
            'foto' => 'images/esc1.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Instalación de esculturas cinéticas transforma un parque urbano en una experiencia interactiva de arte',
            'descripcion' => 'Un parque urbano en la ciudad de Barcelona ha sido transformado por la instalación de una serie de esculturas cinéticas que invitan a los visitantes a explorar el arte en movimiento y experimentar una nueva forma de interacción con el entorno urbano.',
            'contenido' => 'En una iniciativa innovadora que busca fusionar el arte contemporáneo con el espacio público, un parque urbano emblemático en Barcelona ha sido el escenario de la instalación de una serie de esculturas cinéticas únicas. Estas obras de arte, creadas por el reconocido escultor español Carlos Gómez, están diseñadas para capturar la imaginación y estimular los sentidos de quienes las experimentan.
            Cada escultura cinética es una exploración de la relación entre el movimiento y la forma, con elementos que giran, oscilan y cambian de posición en respuesta al viento y al movimiento de los espectadores. Fabricadas en materiales ligeros y resistentes, las obras de Gómez desafían las convenciones tradicionales de la escultura estática y ofrecen una experiencia dinámica y participativa.
            Los visitantes del parque urbano son invitados a recorrer un sendero sinuoso que serpentinea entre las esculturas, permitiéndoles interactuar de cerca con cada obra y descubrir los matices de su movimiento y diseño. Desde grandes estructuras que se balancean suavemente en el viento hasta intrincadas formas que giran y se entrelazan en un ballet cinético, las esculturas de Gómez ofrecen una experiencia multisensorial única.
            La instalación de las esculturas cinéticas ha generado un renovado interés en el parque urbano, atrayendo a una amplia gama de visitantes, desde aficionados al arte hasta familias y turistas. La interacción entre el público y las obras de arte ha enriquecido el ambiente del parque, convirtiéndolo en un espacio vibrante y dinámico donde la creatividad y la expresión artística están en constante evolución.
            Carlos Gómez, el artista detrás de esta innovadora instalación, ha expresado su satisfacción por la respuesta positiva del público y su esperanza de que las esculturas cinéticas inspiren a otros artistas a explorar nuevas formas de arte en el espacio público. Con su enfoque audaz y su visión vanguardista, Gómez ha demostrado que el arte contemporáneo puede transformar no solo los espacios físicos, sino también la forma en que experimentamos y percibimos nuestro entorno urbano.',
            'foto' => 'images/esc2.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Festival de Arte Urbano celebra la creatividad y la diversidad cultural en las calles de Nueva York',
            'descripcion' => 'El Festival de Arte Urbano de Nueva York ha reunido a artistas de todo el mundo para transformar los espacios públicos de la ciudad en lienzos vivientes, llenando las calles con una explosión de colores, formas y mensajes inspiradores.',
            'contenido' => 'Durante una semana emocionante, la ciudad de Nueva York se ha convertido en el escenario de un espectáculo de arte sin precedentes, con el Festival de Arte Urbano atrayendo a artistas y entusiastas del arte de todos los rincones del mundo. Desde grafitis impresionantes hasta murales monumentales, el festival ha celebrado la diversidad cultural y la expresión creativa en todas sus formas.
            Las calles de barrios emblemáticos como Brooklyn, Queens y el Bronx se han convertido en galerías al aire libre, con artistas trabajando en vivo para crear obras de arte que reflejen la rica historia y el espíritu vibrante de la ciudad. Los temas variados abarcan desde la justicia social y la igualdad hasta la naturaleza y la identidad cultural, dando voz a una amplia gama de perspectivas y experiencias.
            Los visitantes del festival tienen la oportunidad de interactuar con los artistas mientras trabajan en sus creaciones, presenciando el proceso creativo en acción y participando en conversaciones significativas sobre arte, comunidad y activismo. Además de las obras de arte en las calles, el festival incluye una serie de eventos complementarios, como charlas, talleres y proyecciones de películas, que profundizan en los temas explorados por los artistas.
            El Festival de Arte Urbano de Nueva York no solo celebra la creatividad individual, sino que también fomenta el diálogo y la conexión entre personas de diferentes culturas y antecedentes. Al transformar los espacios públicos en lugares de encuentro y expresión, el festival promueve la inclusión y la diversidad, inspirando a los neoyorquinos y a visitantes de todo el mundo a apreciar la belleza y el poder del arte urbano.',
            'foto' => 'images/fest.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);





        Noticia::create([
            'titulo' => 'Catalá se lleva a la Alcaldía a la gerente de la fundación Valencia Activa tras los últimos choques con Vox',
            'descripcion' => 'La oposición, Compromís y PSPV, advierte que el cambio obedece a la crisis de gobierno entre PP y su socio ultra y despeja el camino al segundo teniente de alcalde Juanma Badenas',
            'contenido' => 'Los grupos de la oposición en el Ayuntamiento de Valencia, Compromís y PSPV-PSOE, han criticado el nombramiento de Isabel Rubio León como directora general de Relaciones Institucionales de la alcaldesa de Valencia, María José Catalá, del PP, apenas seis meses después de haberla puesto al frente de la fundación de empleo Valencia Activa, un departamento que ahora dirige Vox, su socio de gobierno. Compromís denuncia que es el octavo cargo nombrado a dedo por el PP desde que gobierna el consistorio y el PSPV añade que el cambio despeja el camino al segundo teniente de alcalde, Juan Manuel Badenas, para “convertirlo en un chiringuito” de Vox.
            El grupo valencianista ha indicado que “Catalá ha vuelto a aprobar a escondidas y en la previa de un día festivo, una cuestión tan polémica como la creación de un nuevo cargo directivo para Alcaldía”, al tiempo que ha expuesto que “en total, los ocho cargos creados por la primera edil desde su llegada al gobierno ya suponen un coste para las arcas públicas de 651.069,92 euros”.
            Ferran Puchades, edil de Compromís, considera que el nombramiento de la que fuera gerente de la Fundación Valencia Activa “demuestra que estamos ante una operación para dejar el campo libre al segundo teniente de alcalde, también responsable de Empleo y portavoz de Vox, para que pueda designar a la persona que quiera para encabezar y dirigir sin escrúpulos su agenda ultra”.
            Compromís ha aseverado que Isabel Rubio León, que ha trabajado como asesora para los expresidentes de la Generalitat Francisco Camps y Eduardo Zaplana, fue nombrada por el PP gerente de Valencia Activa el pasado 20 de septiembre mientras que Badenas accedió al control de la entidad el pasado 23 de octubre tras el pacto de gobierno entre PP —al que le faltaban cuatro votos para la mayoría absoluta— y Vox.
            Para el concejal socialista en el Ayuntamiento de Valencia Javier Mateo, la adscripción a Alcaldía de Isabel Rubio es una “confirmación de la crisis de Gobierno de Catalá y Vox, donde la primera está claramente subordinada a los dictados de los ultras”.
            Según Mateo, “Catalá se ha tenido que llevar a la Alcaldía a la hasta ayer gerente de Valencia Activa, puesta por el PP y persona de su máxima confianza” por la mala relación entre ambos socios. El edil socialista advierte que con este “rescate” la alcaldesa “despeja el camino para que Vox tenga vía libre para hacer un nuevo nombramiento y seguir ahondando en el irreparable daño a la Fundación Valencia Activa”. “Está permitiendo que Vox convierta una entidad de reconocido prestigio en materia laboral en un chiringuito en el que dar mítines y eliminar a la mujer de las políticas laborales”, ha denunciado.
            Las tensiones entre PP y Vox desde que cerraron el pasado octubre un acuerdo en gobierno han aflorado públicamente en varias ocasiones. El último episodio se produjo en el pleno municipal de marzo, cuando la oposición interpeló a la alcaldesa sobre los cambios en los estatutos de la fundación de empleo Valencia Activa, de los que PP y Vox eliminaron la mención expresa a las mujeres. Badenas exigió responder a la oposición, en su calidad de responsable de Empleo, pero la alcaldesa María José Catalá le dio la palabra al portavoz del PP, Juan Carlos Caballero, lo que provocó que los cuatro ediles del grupo ultra abandonaran el pleno en protesta y quedasen sin aprobar varias medidas previstas por el equipo de gobierno local. Fuentes municipales han precisado, en respuesta a la denuncia de la oposición, que frente a los ocho altos cargos que ha nombrado Catalá desde su llegada a la alcaldía en junio, Compromís y PSOE llegaron a tener 14 altos cargos cuando gobernaban el Ayuntamiento. Las mismas fuentes apuntaron, en referencia al sueldo de la nueva directora de Relaciones Internacionales de la Alcaldía, que todos los directores generales tienen la misma retribución, tanto en esta legislatura como en la anterior, y está equiparada a la jefatura de servicio”, remarcaron.
            ',
            'foto' => 'images/catala.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Elecciones Locales: Un Cambio de Rumbo en la Política Municipal',
            'descripcion' => 'Las elecciones locales marcan un punto crucial en la política de una comunidad, donde los ciudadanos ejercen su poder para elegir líderes que representen sus intereses y necesidades a nivel municipal. Estos comicios no solo moldean el futuro de una ciudad, sino que también reflejan las tendencias políticas y sociales más amplias en juego.',
            'contenido' => 'Las elecciones locales son un pilar fundamental de la democracia, ya que permiten que los ciudadanos participen activamente en el proceso político y contribuyan a la toma de decisiones que afectan directamente a sus comunidades. A nivel municipal, los votantes eligen alcaldes, concejales y otros funcionarios locales que serán responsables de abordar una amplia gama de cuestiones, desde infraestructura y servicios públicos hasta desarrollo económico y políticas sociales.
            Estas elecciones suelen reflejar no solo las preocupaciones locales, sino también las tendencias políticas más amplias que están en juego a nivel nacional e incluso internacional. Los resultados de las elecciones locales pueden interpretarse como indicadores tempranos de cambios en el panorama político, así como de la confianza del electorado en los partidos y líderes individuales.
            Además, las elecciones locales ofrecen una plataforma importante para la participación ciudadana y el activismo político a nivel comunitario. Los candidatos locales suelen estar más cerca de los votantes y tienen la oportunidad de abordar problemas específicos que afectan directamente a la vida diaria de las personas en sus comunidades.
            En muchos casos, las elecciones locales también son un reflejo de la diversidad y la inclusión en la política, ya que pueden dar voz a grupos minoritarios y marginados que a menudo están subrepresentados en otros niveles de gobierno. La elección de líderes locales de diversos orígenes étnicos, culturales y socioeconómicos puede contribuir a una mayor representatividad y equidad en la toma de decisiones.
            En resumen, las elecciones locales son un componente vital de la vida política de una comunidad, donde los ciudadanos tienen la oportunidad de influir en el futuro de su ciudad y expresar sus valores y preferencias a través del voto. Estos comicios no solo moldean el rumbo de una ciudad, sino que también reflejan las dinámicas políticas y sociales más amplias en juego a nivel local, nacional e incluso global.',
            'foto' => 'images/local.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Tensiones Internacionales: Desafíos Diplomáticos en el Escenario Global',
            'descripcion' => 'Las tensiones internacionales están en aumento, desafiando los cimientos de la diplomacia y la cooperación entre naciones. Desde disputas territoriales hasta conflictos ideológicos, el panorama geopolítico actual presenta una serie de desafíos que requieren un enfoque diplomático cuidadoso y estratégico.',
            'contenido' => 'Las tensiones internacionales se han intensificado en los últimos años, con una serie de factores que contribuyen a la creciente discordia entre naciones. Disputas territoriales en regiones como el Mar del Sur de China y el Medio Oriente han generado conflictos prolongados y una competencia por recursos estratégicos, aumentando las tensiones entre potencias regionales e internacionales.
            Además de las disputas territoriales, los conflictos ideológicos y políticos también están contribuyendo a la inestabilidad geopolítica. La rivalidad entre potencias como Estados Unidos, China y Rusia ha generado una competencia feroz por la influencia global, exacerbando las divisiones y dificultando la cooperación en temas de seguridad, comercio y gobernanza mundial.
            El surgimiento de nuevas amenazas transnacionales, como el cambio climático, el terrorismo y la pandemia de COVID-19, ha añadido una capa adicional de complejidad a las relaciones internacionales. Estos desafíos globales requieren una respuesta coordinada y colaborativa por parte de la comunidad internacional, pero las divergencias políticas y estratégicas obstaculizan los esfuerzos de cooperación.
            En este contexto, la diplomacia se vuelve más crucial que nunca como medio para abordar las diferencias y buscar soluciones pacíficas a los conflictos internacionales. Los esfuerzos diplomáticos deben centrarse en el diálogo constructivo, la negociación de acuerdos mutuamente beneficiosos y el fortalecimiento de los mecanismos de gobernanza global para abordar los desafíos comunes de manera efectiva.
            En resumen, las tensiones internacionales representan uno de los principales desafíos de nuestro tiempo, con implicaciones significativas para la estabilidad y la seguridad mundial. La diplomacia desempeña un papel fundamental en la gestión de estas tensiones y en la promoción de un orden mundial basado en la cooperación, el respeto mutuo y la paz duradera.',
            'foto' => 'images/tension.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El Debate sobre la Gestión del Gobierno de Sánchez',
            'descripcion' => 'La tensión política en España se intensifica a medida que el gobierno de Pedro Sánchez enfrenta críticas de la oposición y desafíos internos que ponen a prueba su capacidad de liderazgo y gestión.',
            'contenido' => 'El gobierno de Pedro Sánchez se encuentra bajo escrutinio público y críticas constantes por parte de la oposición y diversos sectores de la sociedad española. Las tensiones políticas se han agudizado en medio de la crisis económica, la pandemia de COVID-19 y los conflictos territoriales, lo que ha generado un clima de incertidumbre y polarización en el país.
            La gestión de la crisis sanitaria y económica ha sido objeto de controversia, con acusaciones de falta de transparencia, improvisación y falta de coordinación por parte del gobierno. La oposición ha cuestionado las medidas adoptadas y ha exigido una rendición de cuentas más rigurosa sobre el manejo de la pandemia y la distribución de los fondos de recuperación.
            Además, las tensiones se han exacerbado por la situación en Cataluña y el desafío independentista, con divisiones políticas cada vez más profundas sobre el enfoque adecuado para abordar este conflicto. La polarización ideológica y la falta de consenso político han dificultado la búsqueda de soluciones duraderas y han alimentado la inestabilidad política en el país.
            En este contexto, la capacidad de liderazgo y negociación de Pedro Sánchez se ha puesto a prueba, enfrentándose a críticas tanto dentro de su propio partido como de la oposición. La necesidad de construir puentes de diálogo y consenso se vuelve cada vez más urgente para superar las divisiones y encontrar soluciones viables a los desafíos que enfrenta España en la actualidad.
            En resumen, la tensión política en España refleja un panorama complejo y desafiante, caracterizado por la polarización, la confrontación y la falta de consenso. La capacidad del gobierno de Pedro Sánchez para gestionar esta situación y avanzar hacia una agenda de reformas y reconciliación nacional será determinante para el futuro del país.',
            'foto' => 'images/sanchez.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Crisis Migratoria: Desafíos Humanitarios en la Frontera Sur',
            'descripcion' => 'La crisis migratoria en la frontera sur está alcanzando proporciones críticas, desencadenando desafíos humanitarios urgentes que requieren respuestas efectivas por parte de las autoridades gubernamentales y la comunidad internacional.',
            'contenido' => 'La frontera sur se enfrenta a una creciente afluencia de migrantes y solicitantes de asilo, muchos de los cuales huyen de la violencia, la pobreza y la inestabilidad en sus países de origen. Esta situación ha generado una crisis humanitaria con miles de personas que buscan refugio y protección en la frontera, enfrentándose a condiciones extremas y riesgos significativos en su búsqueda de una vida mejor.
            Las capacidades de recepción y procesamiento en los puntos fronterizos se ven abrumadas por el flujo constante de migrantes, lo que genera tensiones y desafíos logísticos para las autoridades locales y nacionales. La falta de recursos y la capacidad limitada para gestionar la llegada masiva de personas están exacerbando la situación humanitaria y planteando interrogantes sobre la capacidad de respuesta del sistema.
            Además de los desafíos logísticos, la crisis migratoria también plantea cuestiones éticas y legales relacionadas con los derechos humanos y la protección de los más vulnerables. La necesidad de garantizar un trato humano y digno para los migrantes, especialmente niños y familias, es una prioridad urgente que requiere un enfoque coordinado y solidario por parte de las autoridades y la sociedad en su conjunto.
            En este contexto, es fundamental fortalecer la cooperación internacional y regional para abordar las causas subyacentes de la migración y promover soluciones sostenibles a largo plazo. Esto implica abordar las inequidades económicas, sociales y políticas que impulsan la migración forzada, así como mejorar los mecanismos de protección y asistencia para los migrantes en tránsito y destino.
            En resumen, la crisis migratoria en la frontera sur representa un desafío humanitario de proporciones alarmantes que requiere una respuesta integral y solidaria. Es fundamental adoptar medidas urgentes para garantizar la protección y el bienestar de los migrantes y buscar soluciones efectivas y sostenibles para abordar las causas fundamentales de la migración.',
            'foto' => 'images/migra.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        /********************************************       DEPORTES        ************************************************  */

       

        Noticia::create([
            'titulo' => 'Swiatek: "No tiene sentido hablar de los Juegos Olímpicos, todavía queda mucho"',
            'descripcion' => 'La flamante campeona de Indian Wells buscará el título en Miami, donde confiesa todavía no estar pensando en París 2024. Además, la número 1 habló del cambio de condiciones tras pasar por el desierto.',
            'contenido' => 'Este año sí estará presente. Iga Swiatek pisa ya el Miami Open y lo hará como reciente campeona de Indian Wells. ¿Podrá conseguir hacerse con el ‘Sunshine Double’? De momento, la número 1 del mundo atendió a los medios de comunicación para charlar acerca del cambio de condiciones respecto al desierto californiano, de los Juegos Olímpicos y de su gran número de victorias aplastantes.

            - Sobre sus triunfos tan abultados
            
            “Creo que lo único que realmente me permite tener este tipo de resultados es solamente porque miro hacia adelante y estoy muy centrada en la técnica y las tácticas sobre lo que quiero hacer en pista, en vez de en qué efecto quiero conseguir. He estado hablando sobre esto desde 2022, ya no me importa. Es divertido para los fans e incluso la gente cercana a mi como mis amigos o mi familia hablan un poco sobre eso. Pero yo no voy a hacerlo porque quiero respetar a mis oponentes. Sé que no es fácil perder un set así. Entiendo que es entretenimiento, pero me voy a mantener alejada de eso y me voy a enfocar solo en mi trabajo”, declaró Iga Swiatek en el Media Day del Miami Open.
            
            - Los Juegos Olímpicos, una fecha todavía lejana
            
            “No estoy concentrándome en ellos, son en diferentes superficies y en diferentes continentes. Así que de momento me lo estoy tomando todo pasito a pasito. No tengo expectativas porque sé lo difícil que es ese torneo y lo duro que es manejarlo a veces. Sé que va a haber mucha presión porque obviamente es tierra, es Roland Garros. Pero, sinceramente, estuve en Tokio y he pasado por toda esa vibra olímpica, y aunque fuera en tiempo de Covid, pude sentirlo. Solo espero hacer un mejor trabajo manejándolo. Aunque creo que no tiene sentido hablar sobre eso ahora porque todavía queda mucho para los Juegos Olímpicos”.
            
            - Su adaptación al cambio de condiciones entre Indian Wells y Miami
            
            "No lo tomaría como una desventaja, no quiero ponerme a mí misma en esa posición, no es fácil. Creo que es la parte más difícil de nuestro trabajo, mantener la consistencia y adaptarnos rápido a las nuevas condiciones, especialmente cuando son tan diferentes. Pero creo que voy a tener esta situación si voy a jugar con tanta frecuencia en los próximos dos meses. Estoy preparada para eso. Obviamente quiero jugar bien, así que quiero tener este tipo de problemas, este tipo de paciencia y no esperar estar al 100% cómoda desde el primer día. Espero adaptarme a las condiciones en medio del torneo como hice en Indian Wells, donde creo que estuve jugando cada vez mejor después de los entrenamientos entre partidos”.
            
            - No tiene que demostrar nada
            
            “Estoy en un lugar diferente, he aprendido mucho y creo que lo he demostrado. Siento que ese era el tema principal en ese momento hace dos años: demostrar a todos que estoy en el lugar correcto. Así que ahora no siento que necesite hacer eso. Creo que he hecho bien mi trabajo bien y quiero continuar haciéndolo”.',
            'foto' => 'images/iga.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,deporte,baloncesto,tenis,partido,entrenador',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'SAINZ ADMITE NO ESTAR AL 100%, PERO ESPERA "LUCHAR POR LA POLE"',
            'descripcion' => 'Carlos Sainz reapareció el viernes en el GP de Australia 2024 de F1 tras perderse Yeda por apendicitis y, aunque aún no está al 100%, ya piensa en la pole.',
            'contenido' => 'Después de haberse perdido el Gran Premio de Arabia Saudí al tener que ser operado de urgencia por apendicitis, el madrileño ha vuelto este viernes a subirse al monoplaza sólo dos semanas después y, debido a ello, asegura que sus tiempos no lucieron tanto como los de su compañero de equipo, que terminó la jornada como líder con un crono de 1:17.227.
            Nada más bajarse de su coche con el tercer mejor tiempo en la FP2, Carlos Sainz habló sobre su estado de salud y fue sincero al reconocer que todavía no se siente al 100%, aunque reconoció que el hecho de haber podido completar la FP1 y la FP2 sin problemas ya era un gran motivo de satisfacción.
            "Me siento bien, obviamente estoy cansado después de los entrenamientos y no me he sentido al 100% físicamente, pero creo que he tenido un buen día. Y si me hubieras dicho hace una semana que podía completar las dos sesiones sin problemas, habría sido difícil de creer, así que estoy muy contento".
            "Ahora necesito dormir bien y recuperarme lo mejor posible para mañana. Me siento bien", añadió.
            Pese a que Charles Leclerc marcó el ritmo y fue la referencia para Ferrari y para toda la parrilla este viernes, el español cree que será mucho más competitivo a medida que avance el fin de semana.
            "Creo que Charles ha sido muy rápido hoy. Por mi parte, obviamente, he ido paso a paso y he ido a un ritmo que no estaba en el límite del coche y tampoco en mi límite personal, pero creo que con más vueltas y un poco más de confianza seré más rápido mañana", aseguró.
            Aunque físicamente todavía está algo mermado por su reciente operación de apendicitis, Carlos Sainz tiene muy claro que a partir del sábado tiene luchar por lo máximo con su SF-24 en el Gran Premio de Australia, por lo que se pone como objetivo la pole position.
            "Espero luchar por la pole position con él [Leclerc] y contra todos los demás, porque creo que va a estar muy apretado todo, lo vimos en la FP1, creo que en la FP2 dimos un buen paso adelante, pero sí, creo que la clasificación de mañana va a ser algo más parecido a la FP1", concluyó el madrileño en Albert Park.',
            'foto' => 'images/sainz.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,deporte,baloncesto,tenis,partido,entrenador',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Dimitrov y Sinner, de momento a momento',
            'descripcion' => 'El búlgaro reafirma su estado de gracia ante Zverev (6-4, 6-7(4) y 6-4) y se medirá el domingo por el título con Sinner, lanzado e implacable contra Medvedev (6-1 y 6-2)',
            'contenido' => 'A falta del episodio final, este Masters de Miami queda traducido a una cuestión de momentos. Más concentrado uno, más prolongado el otro. Descabalgado Carlos Alcaraz de la pelea, el cartel definitivo muestra los nombres de Jannik Sinner y Grigor Dimitrov, dos tenistas en estado de gracia. Poca novedad, en el caso del primero; fantástica noticia lo del segundo. Hasta hace no mucho, pocos hubieran apostado por el renacimiento del búlgaro, al que de alguna manera se daba por amortizado, teniendo en cuenta que ya ha superado la treintena y que su mejor momento se remonta a siete años atrás, cuando conquistó la Copa de Maestros en Londres. Ahora, de vuelta, desafiará este domingo (21.00, Movistar) al italiano, que contabiliza todos los partidos de este año por victorias, a excepción del zarpazo que le dio Alcaraz en las semifinales de Indian Wells.
            En estos momentos, Sinner sigue erigiéndose como el más regular y el más poderoso. Campeón en Australia y Róterdam, y montado sobre una impresionante racha de 21 victorias en 22 encuentros, barrió este viernes a Daniil Medvedev, que cedió en 1h 09m: 6-1 y 6-2. El ruso, irreconocible por la fragilidad de su juego y su orgullo anestesiado, fue incapaz de hacerle frente y se dejó ir, recordando quizá la dolorosa derrota de enero en Melbourne, cuando el pelirrojo le levantó dos sets en la gran final. Selló la tarde con 22 errores no forzados y tan solo siete golpes ganadores, mientras del otro lado ni siquiera se llegó a pisar el acelerador de verdad. El de San Cándido neutralizó las tres bolas de rotura en contra que hubo de defender, y la inercia le condujo a firmar una tarjeta con 17 winners y solo tres errores.
            De este modo, Sinner disputará su tercera final en Miami —tras las de 2021 y 2023— y aspira a celebrar su segundo Masters 1000, tras el éxito del curso pasado en Toronto. “Estoy sorprendido conmigo mismo”, admite. “Pero me concentro en el día a día, porque ahora los rivales me conocen mejor y quieren ganarme, así que debo estar preparado”, continúa el italiano, que tiene ante sí también la oportunidad de desbancar a Alcaraz en el segundo peldaño de la ATP; de vencer lo conseguiría, a la par que alcanzaría el mejor ranking de su carrera. En cualquier paso, enfrente tendrá a un adversario que ha revertido la dinámica a la baja de los últimos años y que se ha filtrado de nuevo entre los más fuertes del circuito, con la confianza disparada. De momento, el triunfo contra Zverev (6-4, 6-7(4) y 6-4, en 2h 37m) le concede a Dimitrov la novena plaza.
            “Ahora lucho mis propias batallas. Corro mi propia carrera. Estoy en un camino muy diferente en mi vida, en mi carrera. Es mucho lo que se ha hecho, mucho el trabajo, mucho todo lo que hay detrás. Seguí creyendo, seguí prosperando, seguí teniendo fe en mí mismo...”, argumenta el de Jaskovo, hasta hace no demasiado un competidor tristón y decaído, lastrado por esa dañina comparación con Roger Federer —Baby Federer, por el paralelismo estético— que por fin ha dejado atrás para ir descubriéndose a sí mismo. Soberbio ante Alcaraz, supo manejar los instantes delicados del pulso con Zverev, que le había vencido siete veces consecutivas, y saboreará su tercera final de un mil. Dilata así el acelerón que dio en el otoño —otro triunfo contra Alcaraz y final en París-Bercy— y que mantiene esta campaña, en la que ya ha engarzado el título de Brisbane.
            No figuraba en el top-10 desde 2018. No ganaba un trofeo desde 2017. No conseguía levantar cabeza. Pero aquí está otra vez Dimitrov, y el tenis lo celebra. Solo queda por ver si la respuesta física y anímica ante Sinner está a la altura. El italiano domina el cara a cara por 2-1, con dos victorias (Miami y Pekín) en 2023.',
            'foto' => 'images/dimitrov.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,baloncesto,tenis,partido',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Osasuna regala a Arrasate su mejor versión',
            'descripcion' => 'Los rojillos hacen el mejor regalo posible a su míster tras anunciar su adiós',
            'contenido' => 'Pintaba a semana complicada para Osasuna tras anuciar Arrasate el final de su etapa en el banquillo rojillo. Visitaba al renacido Almería de Pepe Mel. Ni dos minutos tardó en esfurmase el subidón rojiblanco. Los que tardó en encontrar Moncayola la espalda de Centelles y Arribas para que Areso cediese atrás, en el famoso pase de la muerte, y Arnaiz la mandase a la jaula. Acción al más puro estilo Arrasate.
            Sin tiempo apenas para celebrar, un regalo de Maximiano dejó herido de muerte al Almería. Cedió Radovanocic un balón que no lo querría ni su peor enemigo, pero el meta almeriense en el intento de evitar un córner, regaló un gol. Su despeje acabó en los pies de Moncayola que de primeras cedió a un Budimir que solo tuvo que empujar la pelota al fondo de la red. En menos de diez minutos, Osasuna ya había dejado claro que no tiene intención de dejarse ir en este final de curso pese a la despedida de Arrasate. No merece un mal final el técnico rojillo y no parece que sus jugadores se lo vayan a dar.
            Volviendo al Almería, los de Mel, que venían de ganar en Las Palmas, regresaron a las pesadillas que llevan sufriendo todo el curso. Dos regalos, dos goles en contra. Bien es cierto que el segundo tanto tuvo su dosis de polémica. El balón pudo haber salido por línea de fondo antes de que Maximiano lo despejase. No parece poca cosa cambiar un córner por un gol. Pero eso pudo pensarlo también el portero antes de ceder a Moncayola.
            Reaccionaron pese a todo y acabaron el primer tiempo con asedio a la portería navarra. Pocas ocasiones, pero al menos con la sensación de querer agarrarse al partido. Y así comenzó el segundo tiempo. Con un Almería en busca de gol que le enganchase al choque. Varias llegadas rojiblancas acabaron en gol de Osasuna. Demasiado castigo para un equipo que cada vez ve más cerca el pozo de la Segunda.
            Iker Muñoz con una gran volea en el área liquidó el choque. El primer partido tras el anuncio del final de la etapa de Arrasate fue un regalo para el técnico. Su equipo volvió a enseñar su versión más fiel. Velocidad y verticalidad made in Arrasate. De regalos fue la tarde.',
            'foto' => 'images/osasuna.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,baloncesto,tenis,partido',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Luis Enrique: "Me gustó que la afición del Madrid aplaudiera a Yamal"',
            'descripcion' => 'El entrenador del PSG valoró el gesto del Bernabéu con el futbolista del Barcelona',
            'contenido' => 'Luis Enrique Martínez, técnico del PSG, ha asegurado que le gustó que el Santiago Bernabéu ovacionara al culé Lamine Yamal en el España-Brasil (3-3), en una rueda de prensa previa al clásico francés que enfrentará mañana a su equipo con el Olympique Marsella.
            "Me gustó que la afición del Madrid aplaudiera a un jugador del Barça jugando con la selección española, me pareció un detalle muy bonito, y que un jugador de 16 años pueda salir del estadio del eterno rival aplaudido. Un detalle muy bonito y esperanzador", opinó el entrenador del PSG.
            Luis Enrique indicó, respecto al duelo liguero de alto voltaje que tendrá lugar mañana en Marsella, que es "consciente" de la importancia del clásico para la afición parisina y que el objetivo es ganar todos los partidos de aquí al final de temporada, para asegurarse todos los títulos posibles.
            Consultado sobre la posible titularidad de Kylian Mbappé, Luis Enrique se limitó a afirmar que "todo es posible en la vida" y dijo que todos los jugadores deben estar siempre preparados para jugar. "Prácticamente todos los jugadores están a disposición. Ya veréis la lista de convocados", precisó.,
            El entrenador español también se pronunció sobre la participación de jugadores en los Juegos Olímpicos de este verano, que se celebrarán en París, y apuntó que él es "abierto y laxo", además de recordar que él mismo pudo ganar una medalla de oro en Barcelona92.
            No obstante, puntualizó que es una decisión del club y que su deber es defender los intereses de la entidad. "Hay que analizar cada caso en particular", dijo.',
            'foto' => 'images/enrique.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,baloncesto,tenis,partido',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El infierno de Kick Sauber con las paradas',
            'descripcion' => 'Han tenido cuatro pit stops de más de 20 segundos en las tres primeras carreras de la temporada',
            'contenido' => 'Sumar puntos es cada día más difícil. La zona baja de la parrilla de Fórmula 1 está muy apretada y cada error cuenta. Muchas de las batallas se pierden, ya que la realización se suele centrar en los equipos de adelante, ya que generan más interés. Sin embargo, en este inicio de temporada se ha podido ver repetidas veces un claro error en una de las escuderías.
            Kick Sauber es uno de los tres equipos que no ha sumado ningún punto en este 2024. Su rendimiento ha sido peor de lo esperado, pero aunque hayan tenido opciones de quedar entre los diez primeros, han cometido muchos errores en las paradas a boxes, siendo el equipo que las hace peor de toda la parrilla.
            Sus pilotos han perdido mucho tiempo en el pit lane esta temporada. Valtteri Bottas tiene un récord este año, aunque malo. Ha tenido la parada más larga, en el Gran Premio de Bahrein, de 52 segundos. El finlandés nunca ha tenido la mejor de las suertes con los pit stops, ya que en Mercedes, un equipo que no suele fallar, tuvo la parada más larga de la historia de la F1, en Mónaco.
            Mientras la media de tiempo en las paradas en la F1 actual está sobre los tres segundos, donde la gran mayoría bajan de esa cifra, Kick Sauber está muy por encima y en esta estadística se puede ver realmente todo el tiempo que han podido perder con sus rivales.
            No parece que sea falta de entrenamiento o experiencia en los mecánicos, ya que las paradas que hacen bien, están sobre los tiempos habituales. Pero sus errores se deben más a despistes, como perder arandelas, un mal uso de la pistola etc. Con todas estas equivocaciones, la media de tiempo en paradas del equipo es de 14 segundos.
            Además, han tenido fallos en todos los circuitos. En Bahrein, en la vuelta 30, Valtteri Bottas tuvo un pit stop de 52,44 segundos, ya que no conseguían quitar una de las ruedas. El mismo error les ocurrió en Jeddah, pero esa vez con Guanyu Zhou, que tuvo que estar en el pit lane 28,71 segundos.
            En Melbourne, ya no quisieron hacer diferencias y tuvieron errores con ambos pilotos, confirmando que el equipo tiene problemas en general, que debe mejorar si quieren tener opciones a liderar esa zona baja de la tabla. Bottas tuvo una parada de 31,18 segundos y el chino de 20,20. Todos estos errores hacen que la escudería, que será Audi en 2026, tenga una media superior al tiempo de media de paradas con cambios de alerón.',
            'foto' => 'images/sauber.jpg',
            'likes' => 200,
            'guardados' => random_int(10,150),
            'palabras_clave' => 'futbol,baloncesto,tenis,partido',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>2,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);





        /********************************************       ECONOMÍA        ************************************************  */


        


        Noticia::create([
            'titulo' => 'La economía española: luces y sombras en el horizonte',
            'descripcion' => 'Crecimiento moderado, inflación persistente y mercado laboral en recuperación: radiografía de la economía española en el primer trimestre de 2024',
            'contenido' => 'La economía española se encuentra en un momento de incertidumbre. La guerra en Ucrania, la subida de los precios de la energía y las interrupciones en las cadenas de suministro han contribuido a una ralentización del crecimiento económico. Sin embargo, el PIB español creció un 0,4% en el primer trimestre de 2024 en comparación con el trimestre anterior, un crecimiento moderado pero positivo que se espera que se mantenga en los próximos trimestres.
            La inflación se ha convertido en el principal problema económico de España. En el mes de marzo, la tasa de inflación interanual se situó en el 5,5%, una cifra que no se alcanzaba desde hace décadas. La subida de los precios de la energía y los alimentos es la principal causa de la inflación, que está erosionando el poder adquisitivo de los hogares españoles.
            El mercado laboral español ha mostrado signos de recuperación en los últimos meses. La tasa de paro se ha reducido hasta el 12,5%, la más baja desde 2008. La creación de empleo se ha concentrado en el sector servicios, especialmente en el turismo.
            La economía española se enfrenta a una serie de retos en el corto y mediano plazo. La guerra en Ucrania, la inflación y la incertidumbre económica global son algunos de los principales desafíos. El futuro de la economía española dependerá en gran medida de la evolución de la guerra en Ucrania, la contención de la inflación y la capacidad del gobierno para implementar medidas que fomenten el crecimiento económico y la creación de empleo.
            El gobierno español ha implementado una serie de medidas para paliar los efectos de la inflación y la guerra en Ucrania. Entre estas medidas se encuentran la bonificación de 20 céntimos por litro de combustible, la ampliación del bono social eléctrico y la subida del Salario Mínimo Interprofesional (SMI).
            En definitiva, la economía española se encuentra en un momento complejo, con luces y sombras en el horizonte. El crecimiento moderado, la inflación persistente y la recuperación del mercado laboral son algunos de los indicadores que marcarán el futuro económico del país. El gobierno tendrá que tomar medidas contundentes para afrontar los desafíos que se presentan y asegurar la estabilidad económica de España.',
            'foto' => 'images/economia.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El mercado de criptomonedas se estabiliza tras la volatilidad inicial del año',
            'descripcion' => 'Después de un comienzo de año marcado por la incertidumbre y la volatilidad, el mercado de criptomonedas muestra signos de estabilización. Los inversores observan con cautela mientras Bitcoin y otras criptomonedas encuentran un nuevo equilibrio después de las fluctuaciones extremas de los últimos meses.',
            'contenido' => 'El mercado de criptomonedas ha sido objeto de un intenso escrutinio en los últimos tiempos, con fluctuaciones de precios que han desconcertado tanto a inversores como a analistas. Sin embargo, en las últimas semanas, hemos observado una cierta calma después de la tormenta. Bitcoin, la criptomoneda líder, ha mostrado una tendencia alcista moderada, mientras que otras altcoins también muestran signos de recuperación.
            Este periodo de estabilización sigue a una serie de eventos que sacudieron el mercado a principios de año, incluyendo regulaciones más estrictas en varios países, la caída del mercado de valores y preocupaciones sobre la inflación. A pesar de estos desafíos, muchos expertos ven esta fase como una oportunidad para una mayor consolidación y madurez en el mercado de criptomonedas.
            Los inversores están observando de cerca los movimientos del mercado, evaluando tanto los riesgos como las oportunidades. Algunos ven esta estabilización como una señal positiva de que el mercado está encontrando un nuevo equilibrio después de un período tumultuoso, mientras que otros permanecen cautelosos, conscientes de que la volatilidad aún puede persistir en el futuro cercano.
            En última instancia, el futuro del mercado de criptomonedas sigue siendo incierto, pero muchos están optimistas sobre su potencial a largo plazo. A medida que la tecnología blockchain continúa evolucionando y más inversores institucionales ingresan al espacio, es probable que veamos una mayor legitimación y adopción de las criptomonedas en los próximos años.',
            'foto' => 'images/bit.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El precio del petróleo alcanza máximos de seis años impulsado por tensiones geopolíticas',
            'descripcion' => 'Los precios del petróleo han alcanzado niveles no vistos en seis años debido a las crecientes tensiones geopolíticas en importantes regiones productoras. La escalada de conflictos en Medio Oriente y las interrupciones en el suministro están generando preocupaciones sobre la estabilidad del mercado petrolero global.',
            'contenido' => 'El precio del petróleo ha experimentado un notable aumento en las últimas semanas, con el crudo Brent superando los $100 por barril por primera vez desde 2014. Este repunte se debe en gran parte a las tensiones geopolíticas en varias regiones productoras clave, incluido el Medio Oriente.
            Los recientes enfrentamientos entre Arabia Saudita e Irán han aumentado las preocupaciones sobre posibles interrupciones en el suministro de petróleo en la región. Además, la escalada del conflicto en Ucrania y las sanciones occidentales contra Rusia han generado temores de una reducción en las exportaciones de crudo ruso, lo que ha contribuido aún más a la presión alcista sobre los precios del petróleo.
            Estas tensiones geopolíticas han exacerbado los desafíos existentes en el mercado petrolero, incluida la recuperación lenta de la demanda mundial de combustible debido a la pandemia de COVID-19 y las restricciones asociadas. Aunque la Organización de Países Exportadores de Petróleo (OPEP) y sus aliados han aumentado gradualmente la producción para satisfacer la creciente demanda, la incertidumbre geopolítica continúa ejerciendo presión al alza sobre los precios del crudo.
            Los analistas advierten que la volatilidad en el mercado petrolero podría persistir en el corto plazo, especialmente si las tensiones geopolíticas se intensifican aún más. Además, el impacto de los precios más altos del petróleo en la inflación y la economía global es motivo de preocupación, ya que podría aumentar los costos para los consumidores y las empresas, lo que a su vez podría ralentizar la recuperación económica.',
            'foto' => 'images/petrol.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Nuevas regulaciones fiscales impactan en el mercado de criptomonedas',
            'descripcion' => 'Las recientes regulaciones fiscales implementadas por varios países están generando repercusiones en el mercado de criptomonedas. Este artículo explora cómo las nuevas normativas afectan la inversión y el comercio de activos digitales, así como las medidas adoptadas por los inversores para adaptarse a los cambios en el entorno regulatorio.',
            'contenido' => 'La creciente popularidad de las criptomonedas ha llevado a los gobiernos de todo el mundo a considerar nuevas regulaciones fiscales para abordar los desafíos asociados con estos activos digitales. En muchos casos, las autoridades fiscales están buscando mejorar la transparencia y la fiscalización de las transacciones de criptomonedas, así como garantizar el cumplimiento de las obligaciones tributarias por parte de los inversores y comerciantes.
            Las nuevas regulaciones fiscales pueden variar considerablemente de un país a otro. Algunas jurisdicciones han optado por imponer impuestos sobre las ganancias de capital obtenidas a través de la compra y venta de criptomonedas, mientras que otras están considerando gravar las transacciones de criptomonedas de manera similar a las transacciones financieras tradicionales. Estas medidas buscan aumentar la recaudación fiscal y garantizar que los inversores en criptomonedas contribuyan equitativamente al sistema tributario.
            El impacto de las nuevas regulaciones fiscales en el mercado de criptomonedas ha sido variado. Por un lado, algunas medidas regulatorias han generado incertidumbre y volatilidad en el mercado, lo que ha llevado a una corrección en los precios de muchas criptomonedas. Por otro lado, se espera que la implementación de regulaciones claras y transparentes a largo plazo pueda contribuir a la estabilidad y la legitimidad del mercado de criptomonedas, lo que a su vez podría atraer a nuevos inversores institucionales y aumentar la adopción de criptomonedas en la economía global.
            En respuesta a las nuevas regulaciones fiscales, muchos inversores y comerciantes de criptomonedas están adoptando medidas para cumplir con las obligaciones fiscales y mitigar los riesgos asociados con la inversión en activos digitales. Esto incluye la realización de auditorías fiscales internas, la declaración adecuada de las ganancias y pérdidas de criptomonedas en las declaraciones de impuestos, y la búsqueda de asesoramiento profesional para comprender y cumplir con las regulaciones fiscales aplicables en sus jurisdicciones.
            En resumen, las nuevas regulaciones fiscales están remodelando el panorama del mercado de criptomonedas y están generando desafíos y oportunidades para los inversores y comerciantes en este espacio. A medida que los países continúan desarrollando y ajustando sus marcos regulatorios, se espera que el mercado de criptomonedas evolucione para adaptarse a un entorno regulatorio cambiante y maduro.',
            'foto' => 'images/fiscal.jpg',
            'likes' => 200,
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El sector turístico enfrenta desafíos ante la incertidumbre de las restricciones de viaje',
            'descripcion' => 'El sector turístico se enfrenta a nuevos desafíos debido a la incertidumbre que rodea a las restricciones de viaje impuestas por la pandemia. A medida que algunos países flexibilizan las medidas y otros las refuerzan, las empresas turísticas buscan adaptarse a un entorno cambiante mientras intentan recuperarse de las pérdidas sufridas durante la crisis.',
            'contenido' => 'El sector turístico, uno de los más afectados por la pandemia de COVID-19, continúa enfrentando dificultades a medida que las restricciones de viaje fluctúan en todo el mundo. Si bien la progresiva vacunación y la reducción de casos han llevado a la relajación de algunas medidas en ciertos países, la persistencia de variantes del virus y el temor a nuevas oleadas han llevado a otros a mantener o incluso endurecer las restricciones.
            Esta incertidumbre en torno a las restricciones de viaje ha generado desafíos adicionales para las empresas turísticas, que buscan recuperarse de las pérdidas sufridas durante la pandemia. Las agencias de viajes, aerolíneas, hoteles y otros actores de la industria se enfrentan a la difícil tarea de planificar y operar en un entorno caracterizado por la volatilidad y la falta de predictibilidad.
            Las empresas turísticas están implementando diversas estrategias para adaptarse a esta situación cambiante. Esto incluye la flexibilización de las políticas de cancelación y reembolso para brindar mayor tranquilidad a los viajeros, así como la diversificación de las ofertas y destinos para adaptarse a las preferencias emergentes de los turistas en medio de la pandemia.
            Además, la industria turística está intensificando sus esfuerzos para promover destinos seguros y responsables, destacando las medidas de salud y seguridad implementadas en hoteles, aeropuertos y otras instalaciones para tranquilizar a los viajeros preocupados por su bienestar durante el viaje.
            Sin embargo, a pesar de estos esfuerzos, la recuperación completa del sector turístico sigue siendo incierta, ya que la evolución de la pandemia y las medidas gubernamentales continuarán influyendo en los patrones de viaje y el comportamiento del consumidor. La colaboración entre los actores del sector y el apoyo gubernamental seguirán siendo fundamentales para superar los desafíos actuales y sentar las bases para una recuperación sostenible del turismo a nivel global.',
            'foto' => 'images/turistico.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El impacto de la crisis energética en la economía mundial: desafíos y perspectivas',
            'descripcion' => 'La crisis energética desencadenada por la escalada de precios del petróleo y la inestabilidad geopolítica está generando preocupaciones en la economía mundial. Este artículo analiza los diversos impactos de la crisis en los mercados financieros, la inflación, el crecimiento económico y la transición hacia fuentes de energía renovable, así como las perspectivas y desafíos que enfrentan los países y las empresas en este contexto.',
            'contenido' => 'La reciente escalada de precios del petróleo y la inestabilidad geopolítica en diversas regiones del mundo han desencadenado una crisis energética de alcance global, con implicaciones significativas para la economía mundial. Esta crisis ha generado preocupaciones en múltiples sectores y plantea desafíos importantes para los gobiernos, las empresas y los consumidores en todo el mundo.
            Uno de los impactos más inmediatos de la crisis energética se observa en los mercados financieros, donde la volatilidad de los precios del petróleo ha generado incertidumbre y ha afectado a sectores clave, como el transporte, la industria manufacturera y la logística. La escalada de precios también ha aumentado los costos de producción y transporte para las empresas, lo que puede traducirse en presiones inflacionarias adicionales en la economía.
            La inflación, de hecho, es uno de los principales desafíos que enfrentan las autoridades económicas en este contexto. El aumento de los precios de la energía y los productos básicos puede erosionar el poder adquisitivo de los consumidores y afectar negativamente al consumo y la inversión, lo que a su vez puede frenar el crecimiento económico y dificultar la recuperación de la crisis provocada por la pandemia.
            Además, la crisis energética está generando un renovado debate sobre la necesidad de acelerar la transición hacia fuentes de energía renovable y sostenible. Si bien la dependencia del petróleo y otros combustibles fósiles sigue siendo predominante en muchos países, la volatilidad de los precios y la preocupación por el cambio climático están impulsando la inversión en energías limpias y tecnologías renovables.
            Sin embargo, esta transición no está exenta de desafíos. La necesidad de infraestructuras y tecnologías adecuadas, así como de marcos regulatorios y políticas energéticas coherentes, plantea desafíos significativos para los países y las empresas. Además, la transición hacia energías renovables debe ser inclusiva y justa, teniendo en cuenta los impactos sociales y económicos en comunidades dependientes de la industria extractiva tradicional.
            En resumen, la crisis energética actual representa un desafío multifacético que requiere una respuesta coordinada a nivel internacional y un enfoque integral que aborde tanto los aspectos económicos como medioambientales. La adopción de políticas y estrategias orientadas a la diversificación energética, la eficiencia energética y la sostenibilidad será fundamental para mitigar los impactos negativos de la crisis y sentar las bases para un futuro energético más seguro y sostenible.',
            'foto' => 'images/energia.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'economia,pib,bitcoin,global,inflacion',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>1,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);






        /********************************************       TECNOLOGIA        ************************************************  */



        Noticia::create([
            'titulo' => 'España avanza en la digitalización de la administración pública con el lanzamiento de nuevas plataformas online',
            'descripcion' => 'España está dando pasos significativos hacia la digitalización de la administración pública con el lanzamiento de nuevas plataformas en línea que facilitan los trámites y servicios gubernamentales. ',
            'contenido' => 'En un esfuerzo por modernizar la administración pública y hacerla más eficiente, el gobierno español ha puesto en marcha varias iniciativas de digitalización que están transformando la forma en que los ciudadanos interactúan con los servicios gubernamentales.
            Una de estas iniciativas es la plataforma "Trámites.gob.es", que ofrece un punto de acceso único para realizar una amplia variedad de trámites y gestiones con la administración pública. Desde renovar el DNI hasta solicitar certificados o pagar impuestos, esta plataforma facilita el acceso a los servicios gubernamentales de manera rápida y sencilla, eliminando la necesidad de acudir físicamente a las oficinas.
            Además de Trámites.gob.es, se han lanzado otras plataformas especializadas que abordan necesidades específicas de los ciudadanos, como la plataforma de empleo público "Empleo Público.gob.es", que centraliza las convocatorias de oposiciones y facilita la presentación de solicitudes en línea.
            Estas iniciativas no solo simplifican los trámites burocráticos para los ciudadanos, sino que también promueven la transparencia y la eficiencia en la gestión gubernamental. Al reducir la carga administrativa y los tiempos de espera, se mejora la experiencia del usuario y se fomenta una mayor participación en los procesos democráticos.
            El avance en la digitalización de la administración pública en España es un paso importante hacia un gobierno más moderno y orientado al ciudadano. A medida que estas plataformas continúen desarrollándose y expandiéndose, se espera que contribuyan a una mayor agilidad y transparencia en la prestación de servicios públicos, mejorando así la calidad de vida de los ciudadanos españoles.',
            'foto' => 'images/digital.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Startups españolas lideran la revolución de la movilidad urbana con soluciones innovadoras',
            'descripcion' => 'Las startups españolas están en la vanguardia de la transformación de la movilidad urbana, ofreciendo soluciones innovadoras que abordan los desafíos de la congestión del tráfico, la contaminación y la sostenibilidad en las ciudades. ',
            'contenido' => 'En España, un número creciente de startups están abordando los desafíos de la movilidad urbana con soluciones innovadoras que están cambiando la forma en que las personas se desplazan por las ciudades. Desde aplicaciones de movilidad compartida hasta sistemas de transporte eléctrico y plataformas de gestión de flotas, estas empresas están liderando la revolución de la movilidad urbana con tecnologías punteras y modelos de negocio disruptivos.
            Una de las áreas en las que las startups españolas están destacando es en la movilidad compartida, con empresas que ofrecen servicios de bicicletas y patinetes eléctricos compartidos que están transformando la forma en que las personas se mueven por la ciudad. Estos servicios, disponibles a través de aplicaciones móviles, permiten a los usuarios desplazarse de manera rápida, económica y respetuosa con el medio ambiente, reduciendo así la congestión del tráfico y las emisiones de carbono.
            Además de la movilidad compartida, las startups españolas también están desarrollando tecnologías innovadoras en el ámbito de la gestión del tráfico y la logística urbana. Desde sistemas de gestión de flotas hasta plataformas de logística inteligente, estas empresas están utilizando la tecnología para optimizar los desplazamientos y reducir los tiempos de entrega en entornos urbanos cada vez más congestionados.
            Otro área de enfoque es la electrificación del transporte, con startups que están desarrollando soluciones de carga inteligente y redes de recarga para vehículos eléctricos. Estas iniciativas están ayudando a promover la adopción de vehículos eléctricos y a acelerar la transición hacia una movilidad más sostenible y respetuosa con el medio ambiente.
            En resumen, las startups españolas están desempeñando un papel clave en la transformación de la movilidad urbana, ofreciendo soluciones innovadoras que están contribuyendo a crear ciudades más habitables, sostenibles y eficientes. Con su enfoque en la tecnología y la innovación, estas empresas están liderando el camino hacia un futuro de movilidad urbana inteligente y sostenible.',
            'foto' => 'images/start.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'España avanza en la adopción de la tecnología 5G: Impulso a la conectividad y la innovación',
            'descripcion' => 'El despliegue de la tecnología 5G en España está ganando impulso, prometiendo una conectividad ultrarrápida y nuevas oportunidades para la innovación en diversos sectores.',
            'contenido' => 'El desarrollo y despliegue de la tecnología 5G en España están alcanzando hitos significativos, impulsando la conectividad y abriendo nuevas oportunidades para la innovación en diferentes industrias y sectores. Con velocidades de conexión ultrarrápidas, baja latencia y capacidad para conectar un gran número de dispositivos de forma simultánea, el 5G está transformando la forma en que las personas interactúan con la tecnología y acceden a los servicios digitales.
            Una de las áreas más destacadas es la del Internet de las cosas (IoT), donde el 5G está facilitando la interconexión de dispositivos inteligentes y la recopilación de datos en tiempo real. Desde ciudades inteligentes hasta fábricas conectadas, el despliegue de redes 5G está impulsando la adopción de soluciones IoT que mejoran la eficiencia, la seguridad y la calidad de vida de las personas.
            Además del IoT, el 5G está impulsando la adopción de tecnologías emergentes como la realidad virtual (VR) y la realidad aumentada (AR), que están encontrando aplicaciones en sectores como el entretenimiento, la educación y la medicina. Con velocidades de conexión ultra rápidas y baja latencia, el 5G está permitiendo experiencias inmersivas y colaborativas que antes eran difíciles de lograr.
            En el ámbito empresarial, el despliegue de redes 5G está abriendo nuevas oportunidades para la transformación digital y la innovación en los negocios. Desde la automatización de procesos industriales hasta la telemedicina y el comercio electrónico, el 5G está permitiendo a las empresas mejorar su eficiencia operativa, expandir su alcance global y ofrecer nuevos productos y servicios a sus clientes.
            En resumen, el avance de la tecnología 5G en España está impulsando la conectividad y la innovación en todos los ámbitos de la sociedad, desde el hogar hasta la empresa. Con su capacidad para ofrecer velocidades de conexión ultrarrápidas y baja latencia, el 5G está sentando las bases para un futuro digital más avanzado, conectado y colaborativo.',
            'foto' => 'images/5g.jpeg',
            'likes' => 200,
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Madrid Implementa Sistema de Recogida de Residuos Inteligente con Tecnología IoT',
            'descripcion' => 'Madrid avanza hacia una gestión más eficiente de residuos con la introducción de contenedores inteligentes equipados con tecnología IoT.',
            'contenido' => 'Madrid, una de las ciudades más pobladas y dinámicas de España, está dando un paso adelante en la gestión de residuos con la implementación de un sistema innovador de recogida de basura inteligente. Este sistema, basado en la tecnología de Internet de las cosas (IoT), está transformando la manera en que se gestionan los desechos en la capital española, haciéndola más eficiente y sostenible.
            Los contenedores inteligentes, distribuidos estratégicamente por toda la ciudad, están equipados con sensores y dispositivos de comunicación que les permiten enviar información en tiempo real sobre su capacidad y estado. Gracias a esta tecnología avanzada, los servicios de recogida de residuos pueden optimizar las rutas de recolección, identificando los contenedores que necesitan ser vaciados y programando las recogidas de manera más eficiente.
            Una de las principales ventajas de los contenedores inteligentes es su capacidad para detectar niveles de llenado en tiempo real. Los sensores instalados en los contenedores miden continuamente el nivel de residuos y envían esta información a una plataforma centralizada, que analiza los datos y genera rutas de recolección óptimas. Esto permite a los servicios de limpieza planificar las recogidas de manera más eficiente, reduciendo los costos operativos y minimizando el impacto ambiental asociado con la gestión de residuos.
            Además de mejorar la eficiencia en la recolección de basura, los contenedores inteligentes también ofrecen otras funcionalidades avanzadas, como la capacidad de detectar y reportar incidencias, como contenedores bloqueados o dañados. Esta capacidad de monitoreo en tiempo real permite una respuesta más rápida a los problemas y una mayor transparencia en la gestión de residuos en la ciudad.
            En resumen, la implementación de contenedores inteligentes en Madrid representa un avance significativo hacia una gestión de residuos más eficiente y sostenible. Con esta innovadora tecnología IoT, la ciudad está mejorando la calidad de vida de sus ciudadanos, reduciendo los costos asociados con la gestión de residuos y contribuyendo a la protección del medio ambiente.',
            'foto' => 'images/iot.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Avances en Inteligencia Artificial: Transformando la Atención Médica a Escala Mundial',
            'descripcion' => 'La Inteligencia Artificial (IA) está revolucionando la atención médica en todo el mundo, ofreciendo soluciones innovadoras para diagnósticos más precisos, tratamientos personalizados y una mejor gestión de la salud. ',
            'contenido' => 'La Inteligencia Artificial (IA) ha emergido como una herramienta transformadora en el campo de la atención médica, ofreciendo una serie de beneficios que van desde diagnósticos más precisos hasta tratamientos personalizados y una gestión más eficiente de los recursos sanitarios. En todo el mundo, los sistemas de IA están siendo implementados en hospitales, clínicas y centros de atención primaria, con el objetivo de mejorar la calidad de la atención médica y reducir los costos asociados.
            Una de las aplicaciones más destacadas de la IA en el ámbito de la salud es el diagnóstico asistido por ordenador, que utiliza algoritmos de aprendizaje automático para analizar imágenes médicas y detectar patrones que pueden indicar la presencia de enfermedades o condiciones médicas. Estos sistemas son capaces de identificar anomalías en radiografías, tomografías computarizadas y resonancias magnéticas con una precisión comparable o incluso superior a la de los médicos especialistas.
            Además del diagnóstico, la IA también está siendo utilizada para desarrollar tratamientos personalizados, adaptados a las necesidades individuales de cada paciente. Mediante el análisis de grandes cantidades de datos clínicos y genéticos, los sistemas de IA pueden identificar las mejores opciones terapéuticas para cada caso, optimizando la eficacia del tratamiento y minimizando los efectos secundarios.
            Otra área en la que la IA está teniendo un impacto significativo es la gestión de la salud poblacional, permitiendo a los proveedores de atención médica identificar y abordar de manera proactiva las necesidades de salud de comunidades enteras. Utilizando algoritmos de aprendizaje automático, los sistemas de IA pueden analizar datos demográficos, epidemiológicos y de salud para predecir brotes de enfermedades, identificar factores de riesgo y desarrollar estrategias de intervención efectivas.
            En resumen, la Inteligencia Artificial está desempeñando un papel cada vez más importante en la transformación de la atención médica a escala global, ofreciendo soluciones innovadoras para mejorar la precisión, la eficiencia y la accesibilidad de los servicios de salud. A medida que la tecnología continúa evolucionando, es probable que veamos un mayor uso de la IA en todos los aspectos de la atención médica, lo que promete un futuro más saludable y sostenible para millones de personas en todo el mundo.',
            'foto' => 'images/inteligencia.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Innovación en el Transporte Urbano: Valencia Introduce Flotas de Autobuses Eléctricos',
            'descripcion' => 'La ciudad de Valencia apuesta por la sostenibilidad y la tecnología con la incorporación de una nueva flota de autobuses eléctricos.',
            'contenido' => 'Valencia, una de las principales ciudades de España, está liderando el camino hacia un futuro más sostenible con la introducción de una flota de autobuses eléctricos en su red de transporte público. Esta iniciativa forma parte de los esfuerzos de la ciudad por reducir su huella de carbono y promover la movilidad limpia y eficiente en el área metropolitana.
            Los nuevos autobuses eléctricos, equipados con tecnología de última generación, ofrecen numerosas ventajas en comparación con los vehículos tradicionales de combustión interna. Además de ser más respetuosos con el medio ambiente al eliminar las emisiones de gases contaminantes, los autobuses eléctricos también son más silenciosos y requieren menos mantenimiento, lo que se traduce en menores costos operativos a largo plazo.
            Una de las características más destacadas de los autobuses eléctricos de Valencia es su capacidad para recargarse de forma rápida y eficiente en las estaciones de carga distribuidas por toda la ciudad. Gracias a sistemas de carga rápida, los autobuses pueden recuperar la energía necesaria para operar durante todo el día en tan solo unos minutos, lo que garantiza una disponibilidad continua del servicio sin interrupciones significativas.
            Además de los beneficios ambientales y económicos, la introducción de autobuses eléctricos también está mejorando la experiencia de viaje para los usuarios del transporte público en Valencia. Con interiores modernos y confortables, acceso Wi-Fi gratuito y sistemas de información en tiempo real, los nuevos autobuses ofrecen un nivel de comodidad y conveniencia sin precedentes, lo que contribuye a fomentar el uso del transporte público en la ciudad.
            En resumen, la incorporación de autobuses eléctricos en la red de transporte público de Valencia representa un paso importante hacia un futuro más sostenible y respetuoso con el medio ambiente. Con esta iniciativa, la ciudad está demostrando su compromiso con la innovación tecnológica y la mejora de la calidad de vida de sus ciudadanos, sentando las bases para un sistema de transporte urbano más eficiente y sostenible en el siglo XXI.',
            'foto' => 'images/bus.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'tecnologia,ia,informatica,avances,bigdata',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>3,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);





        /********************************************       ARTE        ************************************************  */
        
        

        Noticia::create([
            'titulo' => 'Arte y Cultura Florecen en las Calles de Barcelona: El Renacimiento del Grafiti en el Barrio Gótico',
            'descripcion' => 'El Barrio Gótico de Barcelona se convierte en un lienzo viviente con el resurgimiento del arte callejero y el grafiti, atrayendo a artistas locales y visitantes por igual para explorar las nuevas expresiones de creatividad en las estrechas callejuelas y plazas históricas.',
            'contenido' => 'En el corazón de Barcelona, el Barrio Gótico ha experimentado un renacimiento cultural con la proliferación del arte callejero y el grafiti como formas de expresión vibrantes y auténticas. Lo que alguna vez fue considerado vandalismo, ahora se celebra como una manifestación legítima de creatividad y resistencia, con las calles estrechas y los muros antiguos sirviendo como telón de fondo para una explosión de colores y formas.
            Los artistas locales han abrazado el espíritu del grafiti, infundiendo las calles adoquinadas con nuevas energías y narrativas visuales. Desde obras abstractas y surrealistas hasta retratos realistas y mensajes políticos, cada pieza cuenta una historia única y refleja la diversidad cultural y las complejidades de la vida urbana en Barcelona.
            Los residentes y visitantes por igual se ven atraídos por el aura creativa del Barrio Gótico, explorando sus callejones ocultos y plazas pintorescas en busca de las últimas obras de arte callejero. Tours guiados y eventos culturales ofrecen una visión más profunda del movimiento artístico en evolución, proporcionando contexto histórico y destacando el papel del arte en la comunidad.
            El resurgimiento del grafiti en el Barrio Gótico no solo ha transformado el paisaje urbano, sino que también ha revitalizado el sentido de identidad y orgullo entre los residentes locales. Al celebrar la diversidad y la expresión creativa, el arte callejero se ha convertido en una parte integral del tejido cultural de Barcelona, ​​inspirando a las generaciones futuras de artistas a dejar su huella en la ciudad y en el mundo del arte contemporáneo.',
            'foto' => 'images/barcelona.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Arte Efímero: Explorando la Belleza Temporal en Instalaciones Artísticas',
            'descripcion' => 'El arte efímero, representado en instalaciones temporales, desafía las convenciones tradicionales al ofrecer una experiencia única y fugaz. Estas obras, creadas con materiales perecederos o transformables, invitan al espectador a reflexionar sobre la naturaleza transitoria de la vida y el arte.',
            'contenido' => 'El arte efímero, a diferencia de las obras tradicionales de larga duración, tiene la capacidad de cautivar y sorprender al espectador con su belleza transitoria y su carácter temporal. Estas instalaciones artísticas, creadas con materiales perecederos como flores, arena, hielo o luz, desafían las expectativas convencionales y exploran nuevos territorios en la expresión artística.
            Una de las características más intrigantes del arte efímero es su capacidad para transformar el espacio y crear una experiencia inmersiva para el espectador. Estas instalaciones pueden ocupar desde galerías de arte hasta espacios al aire libre, invitando al público a explorar y participar en la obra de formas sorprendentes y creativas.
            Además de su impacto estético, el arte efímero también plantea preguntas sobre la naturaleza del tiempo, la impermanencia y la fugacidad de la vida. Al experimentar estas obras temporales, el espectador se enfrenta a la realidad de que todas las cosas eventualmente pasan, lo que lleva a una reflexión más profunda sobre el significado y la trascendencia del arte.
            Las instalaciones efímeras, al ser temporales por naturaleza, también desafían los conceptos tradicionales de propiedad y permanencia en el mundo del arte. A menudo, estas obras no pueden conservarse o poseerse en el sentido convencional, lo que las convierte en experiencias únicas y exclusivas para aquellos que tienen la oportunidad de presenciarlas.
            En resumen, el arte efímero ofrece una ventana fascinante hacia nuevas formas de expresión artística y una invitación a contemplar la belleza en su forma más fugaz y efímera. A través de instalaciones temporales y experiencias únicas, estas obras desafían las nociones convencionales de lo que constituye el arte y nos recuerdan la importancia de apreciar el momento presente.',
            'foto' => 'images/efimero.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El Festival de Teatro de Sevilla Regresa con una Explosión de Creatividad y Emoción',
            'descripcion' => 'El Festival de Teatro de Sevilla vuelve a iluminar las calles y escenarios de la ciudad, ofreciendo una ecléctica programación de actuaciones teatrales que van desde clásicos reinventados hasta producciones vanguardistas, brindando una experiencia cultural única para residentes y visitantes por igual.',
            'contenido' => 'El Festival de Teatro de Sevilla, un evento emblemático en el calendario cultural de la ciudad, ha regresado con una nueva edición que promete deleitar y emocionar a los amantes del teatro de todas las edades. Durante semanas, las calles adoquinadas y los teatros históricos de Sevilla se llenarán de vida con una ecléctica programación de actuaciones, talleres y eventos relacionados con el arte escénico.
            Desde producciones clásicas reinventadas hasta obras contemporáneas innovadoras, el festival ofrece algo para todos los gustos y sensibilidades teatrales. Los espectadores pueden disfrutar de actuaciones al aire libre en plazas y parques, así como de producciones íntimas en teatros emblemáticos y salas de actuación alternativas repartidas por toda la ciudad.
            El festival es una celebración de la diversidad y la creatividad en el mundo del teatro, con compañías locales, nacionales e internacionales presentando una amplia gama de géneros y estilos. Desde el drama y la comedia hasta la danza y el teatro experimental, cada actuación ofrece una experiencia única que invita a reflexionar, emocionar y entretener.
            Además de las representaciones teatrales, el festival incluye una variedad de actividades complementarias, como charlas con artistas, talleres de actuación, proyecciones de películas relacionadas con el teatro y eventos especiales para niños y familias. Estas iniciativas buscan fomentar la participación del público y enriquecer la experiencia teatral de manera inclusiva y accesible.
            El Festival de Teatro de Sevilla es más que un evento cultural; es un tributo a la pasión y el talento de los artistas escénicos, así como un homenaje a la rica herencia teatral de la ciudad. Con su diversa y emocionante programación, el festival continúa siendo un punto de encuentro para la comunidad teatral y un escaparate de la vitalidad cultural de Sevilla.',
            'foto' => 'images/sevilla.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El Renacimiento del Arte Urbano: Murales que Transforman Paisajes Urbanos',
            'descripcion' => 'El arte urbano está experimentando un renacimiento en ciudades de todo el mundo, con murales vibrantes y expresivos que transforman los paisajes urbanos en galerías al aire libre. Desde metrópolis hasta pueblos pequeños, el arte callejero está revitalizando espacios públicos y dando voz a diversas comunidades.',
            'contenido' => 'El arte urbano, una forma de expresión cultural que ha existido durante décadas, está experimentando un emocionante renacimiento en la actualidad. En ciudades de todo el mundo, artistas locales e internacionales están llenando los muros y edificios con murales coloridos y provocativos que capturan la esencia de la vida urbana y abordan una variedad de temas sociales, políticos y culturales.
            Lo que comenzó como una forma de expresión clandestina y subversiva ha evolucionado hasta convertirse en una poderosa herramienta de transformación urbana y revitalización comunitaria. Los murales no solo embellecen espacios públicos, sino que también pueden servir como medio para contar historias, celebrar la diversidad cultural y promover el diálogo social.
            En muchas ciudades, los murales se han convertido en atracciones turísticas por derecho propio, atrayendo a visitantes de todo el mundo que desean explorar las vibrantes escenas artísticas locales. Los recorridos de arte callejero se han vuelto populares, brindando a los residentes y visitantes la oportunidad de descubrir nuevas obras de arte y aprender sobre los artistas que las crearon.
            Además de embellecer el entorno urbano, el arte callejero también puede tener un impacto positivo en las comunidades locales al proporcionar oportunidades económicas para los artistas y fomentar un sentido de orgullo y pertenencia entre los residentes. Los murales a menudo reflejan la identidad y la historia de un lugar, convirtiéndose en símbolos de la comunidad y en puntos de referencia culturales.
            A medida que el arte urbano continúa ganando reconocimiento y aceptación en el ámbito mainstream, es importante reconocer su poder para inspirar, provocar y unir a las personas en torno a una visión compartida de un mundo más colorido y creativo. Los murales que adornan nuestros paisajes urbanos son mucho más que simples obras de arte; son testimonios de la creatividad humana y la capacidad del arte para transformar el mundo que nos rodea.',
            'foto' => 'images/urban.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'La Escultura Monumental: Explorando la Grandeza en el Arte Público',
            'descripcion' => 'La escultura monumental ha dejado una huella indeleble en la historia del arte, desde las antiguas civilizaciones hasta la actualidad. Estas imponentes obras maestras adornan plazas, parques y espacios públicos, inspirando admiración y reflexión en quienes las contemplan.',
            'contenido' => 'La escultura monumental, a lo largo de la historia, ha sido una forma de arte que ha deslumbrado y asombrado a las generaciones con su grandeza y majestuosidad. Desde las colosales estatuas de la Antigüedad hasta las modernas esculturas contemporáneas, estas obras maestras han dejado una marca perdurable en la historia del arte.
            Las esculturas monumentales, por su tamaño imponente y su ubicación en espacios públicos, tienen el poder de transformar su entorno y crear un impacto duradero en quienes las observan. Estas obras a menudo se erigen como símbolos de identidad nacional, conmemorando eventos históricos, figuras destacadas o valores culturales.
            Una de las características más fascinantes de la escultura monumental es su capacidad para comunicar ideas y emociones a través de formas tridimensionales. Desde la serenidad de una figura humana hasta la dinámica de una composición abstracta, las esculturas monumentales ofrecen una experiencia estética única que despierta la imaginación y la contemplación.
            Además de su valor artístico, las esculturas monumentales también cumplen funciones prácticas, sirviendo como puntos de referencia en el paisaje urbano y como lugares de encuentro e interacción social. Al ocupar un lugar prominente en el espacio público, estas obras invitan a la reflexión y la participación activa del espectador.
            En resumen, la escultura monumental representa una manifestación sublime del ingenio humano y una celebración de la creatividad en su forma más grandiosa. A través de su belleza y su magnificencia, estas obras continúan inspirando admiración y asombro en las generaciones presentes y futuras.',
            'foto' => 'images/monumental.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Explorando las Vanguardias Artísticas: El Arte Conceptual en el Siglo XXI',
            'descripcion' => 'El arte conceptual, una corriente vanguardista que desafía las convenciones tradicionales del arte visual, continúa inspirando a artistas contemporáneos en el siglo XXI. A través de su enfoque en las ideas y conceptos sobre la ejecución técnica, el arte conceptual invita a los espectadores a reflexionar sobre temas profundos y abstractos de la vida moderna.',
            'contenido' => 'El arte conceptual ha sido una fuerza impulsora en el mundo del arte desde su surgimiento en la década de 1960, desafiando las nociones convencionales de estética y técnica. A diferencia de las formas de arte tradicionales que se centran en la habilidad técnica y la representación visual, el arte conceptual prioriza el concepto o la idea detrás de una obra, a menudo relegando la ejecución técnica a un segundo plano.
            En el siglo XXI, el arte conceptual continúa floreciendo, con artistas de todo el mundo explorando una amplia gama de temas y conceptos a través de diversos medios y formas de expresión. Desde instalaciones de gran escala hasta obras multimedia y performances, el arte conceptual ofrece un lienzo infinito para la experimentación y la innovación artística.
            Lo que distingue al arte conceptual es su enfoque en la conceptualización y la teoría sobre la habilidad técnica o la estética visual. Las obras conceptuales a menudo desafían las expectativas del espectador y lo invitan a reflexionar sobre temas filosóficos, políticos, sociales o existenciales de una manera nueva y provocativa.
            A través de su énfasis en las ideas sobre la forma, el arte conceptual cuestiona las normas establecidas del arte y desafía al espectador a reconsiderar su comprensión de lo que constituye una obra de arte. En lugar de centrarse en la belleza estética o la representación figurativa, el arte conceptual busca estimular la mente y el intelecto del espectador.
            En última instancia, el arte conceptual ofrece una oportunidad para la exploración y la experimentación creativa sin límites, invitando a artistas y espectadores por igual a participar en un diálogo en constante evolución sobre el significado y la naturaleza del arte en el mundo contemporáneo.',
            'foto' => 'images/arte.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'arte,historia,cultura,artista',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>4,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);







        /********************************************       POLITICA        ************************************************  */

        

        Noticia::create([
            'titulo' => 'Elecciones Autonómicas en Cataluña',
            'descripcion' => 'Las elecciones autonómicas en Cataluña generan expectativas y especulaciones sobre el futuro político de la región, mientras los partidos se preparan para una contienda marcada por la incertidumbre.',
            'contenido' => 'Las elecciones autonómicas en Cataluña se presentan como un hito crucial en el panorama político de la región, con repercusiones que pueden trascender las fronteras catalanas y afectar la estabilidad del gobierno central en Madrid. En medio de la polarización política y el desafío independentista, los comicios adquieren una relevancia especial y despiertan un interés generalizado tanto dentro como fuera de Cataluña.
            El contexto político en Cataluña es complejo, con una sociedad dividida entre aquellos que abogan por la independencia y los que defienden la unidad de España. La crisis económica, la gestión de la pandemia y las tensiones sociales han añadido un elemento de incertidumbre a estas elecciones, con un panorama electoral fragmentado y una multiplicidad de actores políticos que dificultan la formación de mayorías estables.
            Los principales partidos políticos en Cataluña se preparan para una contienda electoral marcada por la competencia feroz y la lucha por el poder. Desde los partidos independentistas como Esquerra Republicana de Catalunya (ERC) y Junts per Catalunya, hasta los partidos constitucionalistas como el Partido Socialista de Cataluña (PSC) y Ciudadanos, cada formación busca posicionarse como la opción preferida para liderar el futuro de la región.
            Sin embargo, la incertidumbre sobre los resultados y la posibilidad de un escenario de bloqueo político plantean desafíos adicionales para la estabilidad política y la gobernabilidad en Cataluña. Las negociaciones postelectorales y la capacidad de los partidos para alcanzar acuerdos y coaliciones determinarán en gran medida el rumbo político de la región en los próximos años.
            En conclusión, las elecciones autonómicas en Cataluña representan un momento crucial para el futuro político de la región y para el conjunto de España. Con un panorama marcado por la incertidumbre y las expectativas, los ciudadanos catalanes se preparan para ejercer su derecho al voto y para definir el rumbo de la política regional en un contexto de profundos desafíos y complejidades.',
            'foto' => 'images/elecciones.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'El Conflicto entre Rusia y Ucrania',
            'descripcion' => 'Las tensiones entre Rusia y Ucrania alcanzan un nuevo punto crítico, desatando preocupaciones sobre un posible conflicto armado en la región y sus repercusiones a nivel internacional.',
            'contenido' => 'Las tensiones entre Rusia y Ucrania han llegado a un punto álgido en medio de una escalada de incidentes militares y diplomáticos en la región del Donbás. Con el despliegue de tropas rusas en la frontera y la anexión de Crimea en 2014 aún presente en la memoria, las preocupaciones sobre un posible conflicto armado entre ambos países han aumentado significativamente en las últimas semanas.
            La crisis en el este de Ucrania, donde fuerzas separatistas respaldadas por Rusia han estado combatiendo al gobierno ucraniano desde 2014, ha sido un foco de tensión constante entre Moscú y Kiev. La reciente escalada de violencia y la concentración de tropas rusas en la frontera han generado temores de una invasión rusa a gran escala, lo que podría desencadenar un conflicto de consecuencias impredecibles para la estabilidad regional y global.
            Las potencias occidentales, incluidos Estados Unidos y varios países de la Unión Europea, han expresado su preocupación por la situación y han instado a Rusia a reducir la tensión y buscar una solución pacífica al conflicto en el este de Ucrania. Sin embargo, las relaciones entre Rusia y Occidente se han deteriorado en los últimos años, con sanciones económicas y diplomáticas que han exacerbado aún más las tensiones.
            En este contexto, la comunidad internacional observa con aprensión el desarrollo de los acontecimientos en la región, consciente de las implicaciones geopolíticas y humanitarias de un conflicto armado entre Rusia y Ucrania. Mientras tanto, tanto Moscú como Kiev parecen estar comprometidos con una postura de confrontación, lo que aumenta el riesgo de un desenlace violento que podría desencadenar una crisis de proporciones catastróficas.',
            'foto' => 'images/rusia.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Crisis de Gobierno en España, sus desafíos y perspectivas',
            'descripcion' => 'La situación política en España enfrenta una crisis sin precedentes, con el gobierno de coalición liderado por Pedro Sánchez enfrentando desafíos internos y externos que amenazan su estabilidad y eficacia.',
            'contenido' => 'El gobierno de coalición liderado por el Partido Socialista Obrero Español (PSOE) y Unidas Podemos se encuentra en medio de una profunda crisis política, marcada por tensiones internas y externas que ponen en peligro su continuidad y capacidad de gobernar. Desde su formación en enero de 2020, el ejecutivo de Pedro Sánchez ha enfrentado una serie de desafíos que han debilitado su posición y generaron incertidumbre sobre su futuro.
            Internamente, la coalición entre el PSOE y Unidas Podemos ha sido objeto de tensiones constantes, con diferencias ideológicas y estratégicas que han dificultado la adopción de políticas coherentes y eficaces. Disputas sobre cuestiones clave, como la política económica, la reforma laboral y el enfoque hacia la crisis catalana, han exacerbado las divisiones dentro del gobierno y debilitado su capacidad para implementar su agenda política.
            Externamente, el gobierno de Sánchez ha enfrentado críticas y presiones de diversos actores, incluidos partidos de la oposición, organismos internacionales y medios de comunicación, que cuestionan su gestión de crisis como la pandemia de COVID-19, la crisis migratoria en Ceuta y Melilla, y el conflicto con Marruecos por el Sáhara Occidental.
            En este contexto, la estabilidad del gobierno de coalición se ha vuelto cada vez más frágil, con especulaciones sobre la posibilidad de elecciones anticipadas y la necesidad de reconfigurar el equilibrio de poder dentro del ejecutivo. Mientras tanto, el PSOE y Unidas Podemos buscan mantener la cohesión interna y abordar los desafíos pendientes, conscientes de la importancia de preservar la estabilidad política y social en un momento de gran incertidumbre y transformación.',
            'foto' => 'images/crisis.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Desafíos Políticos en Madrid: La Gestión de una Ciudad Diversa y Dinámica',
            'descripcion' => 'La política madrileña enfrenta una serie de desafíos que van desde la gestión de la movilidad urbana hasta la respuesta a las demandas sociales y la convivencia en una ciudad marcada por la diversidad y la complejidad.',
            'contenido' => 'Madrid, la capital de España, se presenta como un escenario político vibrante y dinámico, donde convergen una gran diversidad de intereses y demandas. La gestión de una ciudad tan compleja y heterogénea plantea una serie de desafíos para los líderes políticos, que deben abordar cuestiones que van desde la movilidad urbana hasta la vivienda, pasando por la seguridad y la calidad de vida de los ciudadanos.
            En materia de movilidad, Madrid se enfrenta al reto de mejorar la accesibilidad y la eficiencia del transporte público, al tiempo que se promueven alternativas sostenibles y se reducen las emisiones contaminantes. La congestión del tráfico y la contaminación atmosférica son problemas urgentes que requieren soluciones innovadoras y un enfoque integral que combine medidas regulatorias con inversiones en infraestructuras y servicios.
            Por otro lado, la ciudad de Madrid es también un reflejo de la diversidad social y cultural de España, con una población multicultural y multilingüe que convive en un espacio común. La integración de comunidades migrantes, la promoción de la igualdad de género y la protección de los derechos LGTBI son temas prioritarios en la agenda política, que requieren un compromiso firme con los valores democráticos y los derechos humanos.
            En este contexto, los líderes políticos de Madrid se enfrentan al desafío de construir una ciudad inclusiva y solidaria, donde todos los ciudadanos puedan disfrutar de una vida digna y participar plenamente en la vida pública. La colaboración entre el gobierno local, las organizaciones civiles y la ciudadanía en su conjunto es esencial para superar los obstáculos y construir juntos un futuro más justo y próspero para todos.',
            'foto' => 'images/madrid.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Joe Biden recauda 25 millones de dólares, cifra récord de un evento político, en un acto de campaña en Nueva York',
            'descripcion' => 'Acompañado por Bill Clinton y Barack Obama, el candidato demócrata protagoniza un multitudinario encuentro con donantes en el que las entradas costaban a partir de 225 hasta 500.00 dólares',
            'contenido' => 'Joe Biden se ha dado este jueves un selecto baño de multitudes como candidato a la reelección en noviembre. Acompañado por sus predecesores demócratas en la Casa Blanca Bil Cllinton y Barack Obama, el actual presidente de EE UU es el gran protagonista de un acto de recaudación de fondos en Nueva York con hechuras de superproducción de Hollywood. Una cifra récord de recaudación, 25 millones de dólares según su campaña, más que todo lo recaudado por su rival republicano, Donald Trump, en el mes de febrero. Un espectáculo de masas, para miles de personas y celebrado en el histórico Radio City Hall de Manhattan, pero limitado a quienes estuvieran dispuestos a pagar 225 dólares por la entrada más barata. Con actuaciones musicales, tarifas premium para hacerse una foto con los tres mandatarios o, en fin, una fiesta posterior con la primera dama, Jill Biden, de anfitriona, para un exclusivo grupo de 500 invitados. El otro gran espectáculo estadounidense, el que generan unas elecciones, nunca defrauda.
            Tres décadas de liderazgo demócrata se han dado cita este jueves en el histórico local de la Sexta Avenida de Manhattan, en un día empapado por la lluvia. Que Nueva York es una ciudad demócrata hasta la médula es bien sabido: Biden ya hizo triplete en febrero con tres actos de recaudación en un solo día, que paralizaron Manhattan por los cortes de tráfico de la caravana presidencial, pero, a diferencia del evento de hoy, aquellos se celebraron en las residencias particulares de grandes donantes. Cifras al margen -los 25 millones de recaudación son un récord en un evento político, según la campaña del actual mandatario-, lo más significativo del acto ha sido la presencia de Obama y Clinton junto a Biden. Ello demuestra que los demócratas han activado el botón de pánico a siete meses de las elecciones presidenciales por la ventaja que el candidato republicano, Donald Trump, saca en muchos sondeos. También, según las encuestas, en los seis estados bisagra o basculantes, en los que un puñado de votos puede decidir la suerte de la votación.
            La cifra de 25 millones de dólares recaudados según la campaña en el acto de Nueva York incluye el dinero de los simpatizantes que entregaron efectivo en las semanas previas para asegurar su asistencia. La recaudación, que supera en cinco millones de dólares el total obtenido por Trump a lo largo del mes de febrero, connota un importante respaldo demócrata a Biden ante encuestas persistentemente bajas. Justo el panorama contrario al de su rival, Trump, al alza en los sondeos y a la zaga del demócrata en recaudación, y cuyos gastos legales, de unos 100 millones de dólares, han drenado buena parte de lo cosechado por sus comités de campaña.
            Pero Trump ya demostró con su victoria de 2016 sobre la demócrata Hillary Clinton que no necesitaba recaudar una mayor cantidad de dinero para hacerse con la presidencia. Aunque Biden tenía 155 millones de dólares en efectivo a finales de febrero, frente a los 37 millones de Trump y su comité de acción política Save America, la reciente entrada en campaña de Obama, que hoy ha viajado con Biden desde Washington a bordo del Air Force One, el avión presidencial, indica que la inquietud en las filas demócratas va camino de convertirse en pánico. Clinton se unió a ellos en Nueva York.
            El acto en la histórica sala de conciertos de la Sexta Avenida de Manhattan, ante la que se congregó un nutrido grupo de manifestantes en demanda de un alto el fuego en Gaza -una constante en todas las salidas públicas de Biden-, es un golpe de efecto, casi psicológico, para remontar el desánimo demócrata ante los sondeos, y pone el broche de oro a una frenética serie de viajes de la campaña presidencial en las últimas tres semanas, las transcurridas desde que su discurso sobre el Estado de la Unión diera el pistoletazo de salida de la carrera electoral y tranquilizara a los demócratas por la energía manifestada en su alocución. Biden ha visitado en este lapso varios campos de batalla electoral, muy en especial circunscripciones disputadas en los Estados del medio Oeste que en 2016 votaron a Trump y en 2020 al demócrata. Casi a razón de un viaje por día, una agenda muy exigente para demostrar al votante que el “anciano con mala memoria” descrito por el fiscal del caso de los papeles clasificados está dispuesto a pelear como un chaval.',
            'foto' => 'images/biden.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        Noticia::create([
            'titulo' => 'Milei carga contra el presidente mexicano: “Que un ignorante como López Obrador hable mal de mí me enaltece”',
            'descripcion' => 'El presidente argentino, en entrevista con la CNN, critica a sus homólogos mexicano y colombiano, y respalda a Israel en la guerra en Gaza',
            'contenido' => 'Que Javier Milei tiene mala relación con los gobiernos de izquierda de América Latina, no es sorpresa para nadie. Pero sus tajantes definiciones sí continúan generando asombro. Esta vez lo hizo en una entrevista con la CNN en Español que se publicará el próximo domingo, aunque los adelantos ya han dado de qué hablar. En los videos que circularon, el conductor del programa, Andrés Oppenheimer, le pregunta puntualmente sobre la relación con su homólogo mexicano, quien ha criticado la elección de Milei como presidente. “Es un halago. Que un ignorante como López Obrador hable mal de mí, me enaltece”, lanzó. El periodista le insiste, esta vez con las palabras de la candidata presidencial Claudia Sheinbaum, del Movimiento de Regeneración Nacional (Morena), que consideró la victoria del ultraderechista como un retroceso para Argentina. “El populismo que ellos tanto ponderan, el socialismo del siglo XXI, a los argentinos les costó 80% de sus ingresos”, respondió.
                Mientras que las palabras de Milei para referirse al mexicano siempre fueron mucho más duras. En una entrevista en el marco de las elecciones presidenciales de Colombia en 2022, el líder de La Libertad Avanza acusó al mandatario norteamericano de ser “patético, lamentable, repugnante” por apoyar a Gustavo Petro. Le criticó y le señaló por ser un representante de “la izquierda radical”. En la nueva entrevista para el canal estadounidense, ahora apunta contra López Obrador y Sheinbaum por no saber de números, después de lanzar su teoría sobre cómo el kirchnerismo sumergió al 10% de los argentinos en la indigencia. “Yo no sé si los socialistas odian más la evidencia empírica o el agua”.
                Sheinbaum le ha respondido este miércoles al presidente argentino y le ha pedido que tenga respeto a López Obrador. “Son proyectos distintos, el pueblo de México decidió echar para atrás el neoliberalismo, y entrar a un nuevo proceso único en México, porque no está copiado en ningún otro lugar. Nosotros reivindicamos el libre mercado, la inversión privada, el papel de los empresarios, estamos en contra de la corrupción, pero también reivindicamos el papel del Estado, en términos del Estado de bienestar”, ha dicho la candidata en un mitin en Oaxaca.
                El presidente argentino también cargó contra Petro, a quien anteriormente ha descalificado en varias ocasiones, tanto que la Embajada de Colombia en Buenos Aires había emitido un comunicado para rechazar “las irrespetuosas declaraciones” del ultra. En el adelanto que ha publicado la CNN, señalan que Milei volvió a descalificar al colombiano por su pasado guerrillero: “Mucho no se puede esperar de alguien que era un asesino terrorista”. En respuesta, el Gobierno colombiano expulsó este miércoles a los diplomáticos argentinos de Bogotá.
                Finalmente, el argentino salió a respaldar a Israel ante la guerra en Gaza y aseguró: “Todo lo que está haciendo lo está haciendo dentro de las reglas de juego, Israel no está cometiendo ni un solo exceso”.
                La victoria de Milei en noviembre pasado representó un enorme golpe, no solo para el peronismo en Argentina, sino para la izquierda latinoamericana. López Obrador, que normalmente tiende a no meterse en política exterior, no pudo ocultar su disgusto y comentó sobre el triunfo del ultraderechista: “Fue un autogol”. Aunque aseguró que respetaban la elección del pueblo argentino, señaló: “Es algo que consideramos no les va a ayudar”. Posteriormente fue consultado en varias ocasiones sobre las medidas que el presidente argentino había tomado, pero no volvió a referirse de manera puntual a su homólogo. Solo lo hizo de manera general, para defender la presencia del Estado y criticar el neoliberalismo. “Es un modelo fracasado”.',
            'foto' => 'images/milei.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);


        /********************************************       OTRA        ************************************************  */

        Noticia::create([
            'titulo' => '',
            'descripcion' => '',
            'contenido' => '',
            'foto' => 'images/.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'politica,gobierno,estado,leyes',
            'hora' => date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59'))),
            'fecha' => date('Y-m-d', mt_rand(strtotime('2024-06-01'), strtotime('2024-06-04'))),
            'categoria_id'=>5,
            'redactor_id' => User::where('rol', 'redactor')->get()->random()->id,
        ]);

        




        /**********************   NOTICIAS ECONOMIA    ************************* */

        //NoticiaController::crearNoticias("economica","Economía");
        //NoticiaController::crearNoticias("deporte","Deportes");
        //NoticiaController::crearNoticias("arbitro","Deportes");
        //NoticiaController::crearNoticias("movil","Tecnología");


        /**********************   COMENTARIOS   ************************* */

        Comment::create([
            'contenido' => 'Muy buena redacción y rápida publicación. Enhorabuena!.',
            'valoracion' => 5,
            'fecha' => date('Y-m-d'),
            'medio' => $usuarioMedio->nombre . ' ' .$usuarioMedio->apellidos,
            'noticia_id' => 1,
        ]);
        Comment::create([
            'contenido' => 'Sin entrar en detalle pero con información detallada, me ha gustado',
            'valoracion' => 4,
            'fecha' => date('Y-m-d'),
            'medio' => $usuarioMedio->nombre . ' ' .$usuarioMedio->apellidos,
            'noticia_id' => 1,
        ]);

        /*Comment::create([
            'contenido' => 'Basura de partido, el atleti esta muy muy mal. Cholo fuer YA!',
            'valoracion' => 3,
            'fecha' => date('Y-m-d'),
            'medio' => $usuarioMedio->nombre . ' ' .$usuarioMedio->apellidos,
            'noticia_id' => 1,
        ]);*/



        /**********************   NOTICIAS SELECCIONADAS   ************************* */


        UserNoticia::create([
            'user_id' => 4,
            'noticia_id' => 2,
            'recomendada' => false,
        ]);


        /**************************  USUARIO DEPORTES (david)   ***************************/

        UserNoticia::create([
            'user_id' => 5,
            'noticia_id' => 1,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 5,
            'noticia_id' => 2,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 5,
            'noticia_id' => 3,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 5,
            'noticia_id' => 4,
            'recomendada' => false,
        ]);



        /**************************  USUARIO ECONOMIA (ana)  ***************************/
        UserNoticia::create([
            'user_id' => 3,
            'noticia_id' => 6,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 3,
            'noticia_id' => 7,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 3,
            'noticia_id' => 8,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 3,
            'noticia_id' => 9,
            'recomendada' => false,
        ]);


        /**************************  USUARIO DEPORTES-TECNOLOGÍA (migue)   ***************************/
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 1,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 2,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 3,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 4,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 11,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 12,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 13,
            'recomendada' => false,
        ]);

        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 14,
            'recomendada' => false,
        ]);
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 16,
            'recomendada' => false,
        ]);
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 20,
            'recomendada' => false,
        ]);
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 18,
            'recomendada' => false,
        ]);
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 17,
            'recomendada' => false,
        ]);
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 30,
            'recomendada' => false,
        ]);
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 31,
            'recomendada' => false,
        ]);
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 38,
            'recomendada' => false,
        ]); 
        UserNoticia::create([
            'user_id' => 6,
            'noticia_id' => 39,
            'recomendada' => false,
        ]);

        
    }
}
