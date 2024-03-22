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
        $usuarioRedactor = User::where('rol', 'redactor')->get()->random();

        Noticia::create([
            'titulo' => 'El Athletic tiene un color especial',
            'descripcion' => 'Enfila la final de Sevilla convirtiéndose en el primer equipo que toma esta temporada el Metropolitano, gracias a un penalti transformado por Berenguer tras grave error de Reinildo',
            'contenido' => 'El Cholo avisó de que este partido dura 180 minutos, con los 90 del Metropolitano no iba a llegar, pero el Athletic se plantará en los que aún han de jugarse con evidente ventaja, la que conceden el gol de Berenguer para convertirse en el primer equipo que toma esta temporada el Metropolitano y que vaya a ser San Mamés en tres semanas quien tenga la última palabra. Señor equipo el de Valverde, porque hay que serlo para doblegar a señor equipo el de Simeone. Entre tanto acierto podía valer con un error... y el que lo cometió fue Reinildo. Luego no hubo forma humana de meter cuchara en el área visitante.
                            En un lado de la balanza, su velocidad para neutralizar la de Iñaki y su posición para dar carrete a Lino por la banda; en el otro, su exceso de energía, su trato con la pelota y los escasos minutos que ha jugado con la rojiblanca desde la lesión. Al del traje negro le pareció que el aparato se inclinaba en todo caso hacia las primeras referencias y envidó con Reinildo en la alineación. Salió cruz. En el ecuador del primer acto, y con el partido equilibrado, el mozambiqueño se aturulló en la salida y estuvo a punto de regalarla. Pero no quedó ahí la cosa: asustado quizás por lo que pudo ser, en la continuación de la jugada hizo una entrada infame a Prados justo cuando éste superaba la línea del área.',
            'foto' => 'images/coparey.jpg',
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'palabras_clave' => 'laliga,futbol,copa,rey',
            'hora'=>date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'categoria_id'=>2,
            'redactor_id' => $usuarioRedactor->id,
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
            'hora'=>date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'categoria_id'=>2,
            'redactor_id' => $usuarioRedactor->id,
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
            'hora'=>date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'categoria_id'=>2,
            'redactor_id' => $usuarioRedactor->id,
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
            'hora'=>date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'categoria_id'=>2,
            'redactor_id' => $usuarioRedactor->id,
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
            'hora'=>date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'categoria_id'=>2,
            'redactor_id' => $usuarioRedactor->id,
        ]);

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
            'hora'=>date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'categoria_id'=>2,
            'redactor_id' => $usuarioRedactor->id,
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
            'hora'=>date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'categoria_id'=>2,
            'redactor_id' => $usuarioRedactor->id,
        ]);

        /**********************   NOTICIAS ECONOMIA    ************************* */

        //NoticiaController::crearNoticias("economica","Economía");
        NoticiaController::crearNoticias("deporte","Deportes");
        NoticiaController::crearNoticias("arbitro","Deportes");
        //NoticiaController::crearNoticias("movil","Tecnología");


        /**********************   COMENTARIOS   ************************* */

        Comment::create([
            'contenido' => 'El mejor partido que he visto en mucho tiempo, me ha encantado. Que grande es Berenguer, aupa athletic ostia, el de Bilbao, no el otro.',
            'valoracion' => 5,
            'fecha' => date('Y-m-d'),
            'medio' => $usuarioMedio->nombre . ' ' .$usuarioMedio->apellidos,
            'noticia_id' => 1,
        ]);

        Comment::create([
            'contenido' => 'Basura de partido, el atleti esta muy muy mal. Cholo fuer YA!',
            'valoracion' => 3,
            'fecha' => date('Y-m-d'),
            'medio' => $usuarioMedio->nombre . ' ' .$usuarioMedio->apellidos,
            'noticia_id' => 1,
        ]);



        /**********************   NOTICIAS SELECCIONADAS   ************************* */


        UserNoticia::create([
            'user_id' => 4,
            'noticia_id' => 2,
        ]);
    }
}
