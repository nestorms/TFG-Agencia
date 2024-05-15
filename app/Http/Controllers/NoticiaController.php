<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use Illuminate\Support\Facades\Response;
use App\Models\Noticia;
use App\Models\User;
use App\Models\Category;
use App\Models\UserNoticia;
use App\Models\UserNotification;
use Elastic\Elasticsearch\Client;
use Carbon\Carbon;

use Dompdf\Dompdf;
use Dompdf\Options;

class NoticiaController extends Controller
{
    //
    protected $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }


    public function indexarPrincipal()
    {
        // Obtener todas las noticias
        $noticias = Noticia::all();

        // Eliminar el índice existente si es necesario
        $params = [
            'index' => 'principal',
        ];

        if ($this->elasticsearch->indices()->exists($params)) {
            $this->elasticsearch->indices()->delete($params);
        }


        $mapping = [
            'mappings' => [
                'properties' => [
                    'titulo' => [
                        'type' => 'text',
                        'analyzer' => 'spanish'
                    ],
                    'descripcion' => [
                        'type' => 'text',
                        'analyzer' => 'spanish'
                    ],
                    'contenido' => [
                        'type' => 'text',
                        'analyzer' => 'spanish'
                    ],  
                ]
            ]
        ];

        // Crear un nuevo índice
        $this->elasticsearch->indices()->create([
            'index' => 'principal',
            'body' => $mapping,
        ]);

        // Iterar sobre cada usuario
        foreach ($noticias as $noticia) {

            $params = [
                'index' => 'principal', // Nombre del índice en Elasticsearch
                'id'    => $noticia->id, // ID único de la noticia
                'body'  => [
                    'titulo'       => $noticia->titulo,
                    'descripcion'  => $noticia->descripcion,
                    'contenido'    => $noticia->contenido,
                    'id_redactor'  => $noticia->redactor->id,
                    'id'           => $noticia->id,
                ],
            ];

            // Indexar la noticia en Elasticsearch
            $response = $this->elasticsearch->index($params);
        }

        return response()->json(['message' => 'Noticias de la página principal indexadas correctamente en Elasticsearch!!']);
    }


    public function buscadorIndex(Request $request)
    {
        // Defino los parámetros de la búsqueda
        $params = [
            'index' => 'principal', // Nombre del índice en Elasticsearch
            'body' => [
                'query' => [
                    "bool" => [
                        "should" => [
                            [
                                "match" =>[ "titulo" => $request->busqueda]
                            ],
                            [
                                "match" => [ "descripcion" => $request->busqueda]
                            ],
                            [
                                "match" => [ "contenido" => $request->busqueda]
                            ],
                        ],
                    ],
                ],
            ],
        ];

        // Realizo la consulta a Elasticsearch
        $response = $this->elasticsearch->search($params);

        // Obtengo los resultados de la consulta
        $hits = $response['hits']['hits'];

        // Procesar los resultados 
        $noticias = [];
        foreach ($hits as $hit) {
            // Accedo a la fuente (_source) de cada documento
            $source = $hit['_source'];
            $score = $hit['_score'];
            // Agrego la noticia a la lista de noticias
            $noticias[] = Noticia::findOrFail($source['id']);

            /*$noticias[] = [
                'titulo' => $source['titulo'],
                'descripcion' => $source['descripcion'],
                'score' => $score,
                'id_medio' => $source['id_medio'],
            ];*/
        }

        // Retornar las noticias encontradas
        return view('buscador', ['noticias' => $noticias, 'busqueda' => $request->busqueda]);
    }

    public function indexarNoticias()
    {
        // Obtener todos los medios
        $usuarios = User::where('rol', 'medio')->get();

        // Eliminar el índice existente si es necesario
        $params = [
            'index' => 'noticias',
        ];

        if ($this->elasticsearch->indices()->exists($params)) {
            $this->elasticsearch->indices()->delete($params);
        }


        $mapping = [
            'mappings' => [
                'properties' => [
                    'titulo' => [
                        'type' => 'text',
                        'analyzer' => 'spanish'
                    ],
                    'descripcion' => [
                        'type' => 'text',
                        'analyzer' => 'spanish'
                    ],
                    'contenido' => [
                        'type' => 'text',
                        'analyzer' => 'spanish'
                    ],
                ]
            ]
        ];

        // Crear un nuevo índice
        $this->elasticsearch->indices()->create([
            'index' => 'noticias',
            'body' => $mapping,
            // Agregar cualquier configuración adicional necesaria para el índice
        ]);

        // Iterar sobre cada usuario
        foreach ($usuarios as $usuario) {
            // Obtener todas las noticias asociadas a este perfil de usuario
            $perfiles = $usuario->noticias_medio;

            // Variables para almacenar titulos, contenidos y descripciones
            $titulos = '';
            $contenidos = '';
            $descripciones = '';

            // Itero sobre cada noticia de cada perfil que he obtenido
            foreach ($perfiles as $perfil) {
                $titulos .= $perfil->noticia->titulo . ' ';
                $contenidos .= $perfil->noticia->contenido . ' ';
                $descripciones .= $perfil->noticia->descripcion . ' ';
            }

            $params = [
                'index' => 'noticias', // Nombre del índice en Elasticsearch
                'id'    => $usuario->id, // ID único de la noticia
                'body'  => [
                    'titulo'       => $titulos,
                    'descripcion'  => $descripciones,
                    'contenido'    => $contenidos,
                    'id_medio'     => $usuario->id,
                ],
            ];

            // Indexar la noticia en Elasticsearch
            $response = $this->elasticsearch->index($params);
        }


        return response()->json(['message' => 'Noticias indexadas correctamente en Elasticsearch!!']);
    }

    public function recomendar()
    {
        // Definir los parámetros de búsqueda

        //$noticias = Noticia::where('id', '>=', 25)->get();

        // Obtengo la fecha de hoy
        $hoy = Carbon::now();

        // Obtengo la fecha de ayer
        $ayer = $hoy->subDay();

        // Consultar las noticias publicadas el día anterior
        $noticias = Noticia::whereDate('fecha', $ayer)->get();
        UserNoticia::where('recomendada',true)->delete();

        if (UserNotification::count() > 0) {
            UserNotification::truncate();
        }

        $noticias2 = [];
        foreach($noticias as $noticia){

            $params = [
                'index' => 'noticias', // Nombre del índice en Elasticsearch
                'body' => [
                    'query' => [
                        "bool" => [
                            "must" => [
                                [
                                    "match" =>[ "titulo" => $noticia->titulo]
                                ],
                                [
                                    "match" => [ "descripcion" => $noticia->descripcion]
                                ],
                                [
                                    "match" =>[ "contenido" => $noticia->contenido]
                                ],
                            ],
                        ],
                    ],
                ],
            ];

    
            // Realizar la consulta a Elasticsearch
            $response = $this->elasticsearch->search($params);
    
            // Obtener los resultados de la consulta
            $hits = $response['hits']['hits'];
    
            // Procesar los resultados según sea necesario
            
            foreach ($hits as $hit) {
                // Acceder a la fuente (_source) de cada documento
                $source = $hit['_source'];
                $score = $hit['_score'];
                // Agregar la noticia a la lista de noticias
                $noticias2[] = [
                    /*'titulo' => $source['titulo'],
                    'descripcion' => $source['descripcion'],*/
                    'score' => $score,
                    'id_medio' => $source['id_medio'],
                    'noticia' => $noticia,
                ];
            }
        }

        // Inicializa un array para almacenar las noticias agrupadas por id_medio
        $noticias_por_medio = [];

        // Agrupa las noticias por id_medio
        foreach ($noticias2 as $noticia) {
            $id_medio = $noticia['id_medio'];
            $noticias_por_medio[$id_medio][] = $noticia;
        }

        // Recorre cada grupo de noticias por id_medio
        foreach ($noticias_por_medio as $id_medio => &$notis) {
            // Ordena las noticias por score de forma descendente
            usort($notis, function($a, $b) {
                return $b['score'] <=> $a['score'];
            });
            
            // Selecciona las cinco primeras noticias de cada grupo después de ordenarlas
            $notis = array_slice($notis, 0, 5);
        }

        // Ahora $noticias_por_medio contiene las tres noticias con el score más alto asociadas a cada medio
        foreach ($noticias_por_medio as $id_medio => $noticias) {
            foreach ($noticias as $noticia) {
                // Crear una entrada en la tabla UserNoticia
                UserNoticia::create([
                    'user_id' => $id_medio,
                    'noticia_id' => $noticia['noticia']->id,
                    'recomendada' => true,
                ]);
        
                // Crear una entrada en la tabla UserNotification
                UserNotification::create([
                    'user_id' => $id_medio,
                    'noticia_id' => $noticia['noticia']->id,
                    'estado' => 'pendiente',
                    'descripcion' => "Tienes una nueva noticia recomendada de " . $noticia['noticia']->category->nombre,
                    'fecha' => date('Y-m-d'),
                ]);
            }
        }

        // Retornar las noticias encontradas
        return response()->json(['noticias2' => $noticias_por_medio]);
    }

    public function index()
    {
        // Llama a la función para obtener las noticias 
        $noticias = Noticia::limit(41)->get();
        $noticias2 = Noticia::orderByDesc('likes')->limit(3)->get();

        // Pasa los datos recuperados a la vista
        return view('index', ['noticias' => $noticias, 'noticias2' => $noticias2]);
    }

    public function noticiasRecientes()
    {
        // Llama a la función para obtener las noticias mas recientes
        $noticias = Noticia::orderByDesc('fecha')->limit(15)->get();

        // Pasa los datos recuperados a la vista
        return view('recientes', ['noticias' => $noticias]);
    }

    public function show($id){

        $noticia = Noticia::findOrFail($id);

        return view('noticia', ['noticia' => $noticia]);
    }

    public function showNotification($id){

        $noticia = Noticia::findOrFail($id);
        $notificacion = UserNotification::where('user_id',auth()->user()->id)->where('noticia_id',$id)->first();;

        if ($notificacion && $notificacion->estado == "pendiente") {
            UserNotification::where('user_id', auth()->user()->id)
            ->where('noticia_id', $id)
            ->where('estado', 'pendiente')
            ->update(['estado' => 'leida']); 
        }


        return view('noticia', ['noticia' => $noticia]);
    }

    public function deleteNotification($id){

        $noticia = Noticia::findOrFail($id);
        $notificacion = UserNotification::where('user_id',auth()->user()->id)->where('noticia_id',$id)->first();;

        if ($notificacion) {
            UserNotification::where('user_id', auth()->user()->id)
            ->where('noticia_id', $id)
            ->delete(); 
        }

        return back();
    }

    public function noticiasRecomendadas($id){
        $noticias = [];

        //Si no se ha iniciado sesión o el usuario es de tipo redactor, no podrá ver la sección de recomendadas igual que los medios
        
        if($id == 0 ){
            return view('recomendadas', ['noticias' => $noticias]);
        }
        else{
            $usuario=User::findOrFail($id);
            if($usuario->rol == "redactor"){
                return view('recomendadas', ['noticias' => $noticias]);
            }
        }

        $userNoticias = UserNoticia::where('user_id', $id)->where('recomendada', true)->get();
        
        foreach($userNoticias as $userNoticia){
            $noticias[]=$userNoticia->noticia;
        }

        return view('recomendadas', ['noticias' => $noticias]);
    }

    public function modificar($id){
        
        $noticia = Noticia::findOrFail($id);
        $categorias = Category::whereNotIn('id', [$noticia->category->id])->get();

        return view('modificar_noticia', ['noticia' => $noticia, 'categorias' => $categorias]);
    }

    public function publicar(){
        
        $categorias = Category::all();

        return view('crear_noticia', ['categorias' => $categorias]);
    }

    public function create(Request $request){
        $noticia = $request->validate([
            'titulo' => 'required|min:2',
            'descripcion' => 'required|min:2',
            'contenido' => 'required||min:7',
            'categoria_id' => 'required',
            'foto' => 'required',
            'palabras_clave',
            'fecha' => 'required'],
            [
                'titulo.required' => 'El campo titulo es obligatorio',
                'titulo.min' => 'Longitud mínima de 2 caracteres',
                'descripcion.required' => 'El campo descripcion es obligatorio',
                'descripcion.min' => 'Longitud mínima de 2 caracteres',
                'categoria_id.required' => 'El campo categoria es obligatorio',
                'contenido.required' => 'El campo contenido es obligatorio',
                'contenido.min' => 'Longitud mínima de 7 caracteres',
                'fecha.required' => 'El campo fecha es obligatorio', 
                'foto.required' => 'El campo foto es obligatorio'               
            ]);

        // Guardar la imagen en el sistema de archivos
        if($request->filled('foto')){

            $imagenPath = "images/" . $request['foto'] ;
            $noticia['foto'] = $imagenPath;
        }

        $noticia['likes']=random_int(10,150);
        $noticia['redactor_id']=auth()->user()->id;
        $noticia['guardados']=random_int(10,150);
        $noticia['hora']=date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59')));

        
        Noticia::create($noticia);


        return redirect('/')->with('message', 'Se ha creado la noticia con éxito');
    }

    public function update(Request $request, $id){

        $noticia = Noticia::findOrFail($id);

        $datos = $request->only(['titulo', 'descripcion', 'palabras_clave', 'fecha', 'contenido', 'categoria_id']);

        // Guardar la imagen en el sistema de archivos
        if($request->filled('foto')){

            $imagenPath = "images/" . $request['foto'] ;
            $noticia->foto = $imagenPath;
        }

        $noticia->hora = date('H:i:s', mt_rand(strtotime('00:00:00'), strtotime('23:59:59')));

        $noticia->fill($datos);
        $noticia->save();

        return redirect()->route('administracion')->with('message',"Noticia modificada con éxito");
    }

    public function delete($id){
        
        Noticia::findOrFail($id)->delete();

        return redirect()->route('administracion')->with('message',"Noticia eliminada con éxito");
    }


    public function mostrarCategorias()
    {
        // Obtengo las categorías
        $categorias = Category::all();

        // Para cada categoría, obtengo las noticias asociadas
        $noticiasPorCategoria = [];
        foreach ($categorias as $categoria) {

            // Obtengo las noticias asociadas a la categoría actual
            $noticias = Noticia::where('categoria_id', $categoria->id)->take(3)->get();
            
            // Almaceno las noticias en un array 
            $noticiasPorCategoria[$categoria->nombre] = $noticias;
        }

        // Pasar las categorías y las noticias asociadas a la plantilla Blade
        return view('categorias', compact('categorias', 'noticiasPorCategoria'));
    }

    public function mostrarNoticiasCategoria($id)
    {
        // Obtengo la categoría
        $categoria = Category::findOrFail($id);

        // Obtengo las noticias asociadas a la categoría actual
        $noticias = Noticia::where('categoria_id', $categoria->id)->get();

        return view('seccion', compact('categoria', 'noticias'));
    }


    public static function crearNoticias($consulta, $categoria){
        // Obtener noticias de la API
        $noticias = NoticiaController::obtenerNewsAPI($consulta);
            
        $usuariosMedio = User::where('rol', 'medio')->get();

        $categoria = Category::where('nombre',$categoria)->get()->first();
        

        // Almacenar las noticias en la base de datos
        foreach ($noticias as $noticia) {

            $usuarioMedio = $usuariosMedio->random();

            //list($fecha, $hora) = explode('T', $noticia['publishedAt']);

            $fechaHora = explode('T', $noticia->publishedAt);
            $fecha = $fechaHora[0];
            $hora = $fechaHora[1];

            Noticia::create([
                'titulo' => $noticia->title,
                'descripcion' => $noticia->description,
                'foto' => $noticia->urlToImage,
                'contenido' => $noticia->content,
                'likes' => rand(10,150),
                'guardados' => rand(10,150),
                'fecha' => $fecha,
                'hora' => substr($hora, 0, 8),
                'redactor_id' => $usuarioMedio->id, 
                'categoria_id' => $categoria->id, 
                // Otros campos de la noticia...
            ]);
        }
    }


    public static function obtenerNewsAPI($consulta){

        $newsapi = new NewsApi('8b979930f5714e1bb4d38e1842b3bd66');
        $category="business";
        
        # /v2/top-headlines/sources
        $sources = $newsapi->getSources($category, "es", null);
        # /v2/everything
        $all_articles = $newsapi->getEverything($consulta, null, null, null, null, null, "es", null,  20, null);

        

        # /v2/top-headlines
        //$top_headlines = $newsapi->getTopHeadlines(null, null, null, null, 20, null);

        if (isset($all_articles->articles)) {
            // Si hay artículos, devolverlos
            return $all_articles->articles;
        } else {
            // Si no hay artículos, devolver un array vacío o manejar el error según sea necesario
            return [];
        }
        
    }

    public function like($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->likes++;
        $noticia->save();
        return response()->json(['likes' => $noticia->likes]);
    }

    public function unlike($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->likes--;
        $noticia->save();
        return response()->json(['likes' => $noticia->likes]);
    }

    public function save($id)
    {
        if (auth()->check()) {
            // Obtengo el ID del usuario autenticado
            $userId = auth()->user()->id;
            $noticia = Noticia::findOrFail($id);
            UserNoticia::create([
                'user_id' => $userId,
                'noticia_id' => $id,
                'recomendada' => false,
            ]);
            $noticia->guardados++;
            $noticia->save();
            return response()->json(['saved' => $noticia->guardados]);

        }
        else {
            // Si el usuario no está autenticado, devuelvo mensaje de error
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }

    public function unsave($id)
    {
        if (auth()->check()) {
            // Obtengo el ID del usuario autenticado
            $userId = auth()->user()->id;
            $noticia = Noticia::findOrFail($id);
            
            // Busco la fila en la tabla intermedia user_noticia
            UserNoticia::where('user_id', $userId)->where('noticia_id', $id)->where('recomendada', false)->delete();

            $noticia->guardados--;
            $noticia->save();
            return response()->json(['saved' => $noticia->guardados]);

        }
        else {
            // Si el usuario no está autenticado, devuelvo mensaje de error
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }

    public function unsave_personal($id)
    {
        if (auth()->check()) {
            // Obtengo el ID del usuario autenticado
            $userId = auth()->user()->id;
            $noticia = Noticia::findOrFail($id);
            $categorias = Category::all();
            
            // Busco la fila en la tabla intermedia user_noticia
            UserNoticia::where('user_id', $userId)->where('noticia_id', $id)->where('recomendada', false)->delete();

            $noticia->guardados--;
            $noticia->save();

            $personal=UserNoticia::where('user_id',$userId)->where('recomendada', false)->paginate(3);

            return view('personal', ['personal' => $personal, 'categorias' => $categorias, 'ruta' => ""]);
        }
        else {
            // Si el usuario no está autenticado, devuelvo mensaje de error
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }


    public function descargarPDF($id)
    {
        $noticia = Noticia::findOrFail($id);

        // Cargar la vista con la información de la noticia
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);
        
        $pdf->loadHtml(view('noticia_pdf', ['noticia' => $noticia])->render());

        // Renderizar el PDF 
        $pdf->render();

        // Descargar el PDF
        return $pdf->stream('noticia.pdf');
    }

    public function descargarJSON($id)
    {
        $noticia = Noticia::findOrFail($id);

        // Convierto los datos de la noticia a formato JSON
        $noticiaJson = $noticia->toJson();

        // Devuelvo la respuesta HTTP con el contenido 
        return Response::make($noticiaJson, 200, [
            'Content-Type' => 'application/json',
            'Content-Disposition' => 'attachment; filename="noticia.json"',
        ]);
    }  

    public function entrenarModelo()
    {
        // Noticias para entrenar al clasificador
        $noticias = Noticia::all();

        // Convierto las noticias a formato JSON
        foreach ($noticias as $noticia) {

            // Objeto JSON para cada noticia
            $noticia_json = [
                'id' => $noticia->id,
                'titulo' => $noticia->titulo,
                'descripcion' => $noticia->descripcion,
                'contenido' => $noticia->contenido,
                'categoria' => $noticia->category,
                'fecha_publicacion' => $noticia->fecha,
            ];
        
            $noticias_json[] = $noticia_json;
        }

        // Creo un archivo temporal para escribir las noticias en formato JSON
        $archivo_temporal = tempnam(sys_get_temp_dir(), 'noticias');

        // Construyo el objeto JSON final con todas las noticias
        $json_final = json_encode(['noticias' => $noticias_json]);

        // Escribo las noticias en el archivo temporal en formato JSON
        file_put_contents($archivo_temporal, $json_final);


        $ruta_script_python = base_path('resources/py/entrenar_clasificador.py');

        // Ejecutar el script de Python con los datos de script y noticias
        exec("python " . escapeshellarg($ruta_script_python) . " " . escapeshellarg($archivo_temporal) . " 2>&1", $salida, $error);

        //En caso de error lo muestro por pantalla para depurar mejor el código
        if ($error !== 0) {
            $errores[] = "Error al ejecutar el script de Python. Código de error: $error";
            foreach ($salida as $linea) {
                $errores[] = $linea;
            }
            $json_errores = json_encode($errores);

            // Paro la ejecución mostrando los errores si los hay
            dd($json_errores);
        } 

        // Elimino el archivo temporal después de usarlo
        unlink($archivo_temporal);

        // Devuelvo una salida confirmando que todo ha ido bien
        return response()->json(['salida' => "Modelo SVM entrenado correctamente"]);
    } 


    public function clasificar(Request $request)
    {
        $ruta_script_python = base_path('resources/py/predecir_categoria.py');

        // Ejecutar el script de Python y pasarle los datos
        exec("python " . escapeshellarg($ruta_script_python) . " " . escapeshellarg($request->test) . " 2>&1", $salida, $error);

        //En caso de error lo muestro por pantalla para depurar mejor el código
        if ($error !== 0) {
            $errores[] = "Error al ejecutar el script de Python. Código de error: $error";
            foreach ($salida as $linea) {
                $errores[] = $linea;
            }
            // Paro la ejecución mostrando los errores
            dd($salida);
        } 

        //Obtengo el id con la salida del script en Python (la paso a INT)
        $id=intval($salida[0]);
        $categoria=Category::findOrFail($id)->id;

        // Devuelvo la categoría mas probable según el clasificador de NBMultinomial
        return response()->json(['categoria' => $categoria]);
    } 



    public function compararModelos()
    {
        // Noticias para entrenar al clasificador
        $noticias = Noticia::all();

        // Convierto las noticias a formato JSON
        foreach ($noticias as $noticia) {

            // Objeto JSON para cada noticia
            $noticia_json = [
                'id' => $noticia->id,
                'titulo' => $noticia->titulo,
                'descripcion' => $noticia->descripcion,
                'contenido' => $noticia->contenido,
                'categoria' => $noticia->category,
                'fecha_publicacion' => $noticia->fecha,
            ];
        
            $noticias_json[] = $noticia_json;
        }

        // Creo un archivo temporal para escribir las noticias en formato JSON
        $archivo_temporal = tempnam(sys_get_temp_dir(), 'noticias');

        // Construyo el objeto JSON final con todas las noticias
        $json_final = json_encode(['noticias' => $noticias_json]);

        // Escribo las noticias en el archivo temporal en formato JSON
        file_put_contents($archivo_temporal, $json_final);


        $ruta_script_python = base_path('resources/py/comparar_clasificadores.py');

        // Ejecutar el script de Python con los datos de script y noticias
        exec("python " . escapeshellarg($ruta_script_python) . " " . escapeshellarg($archivo_temporal) . " 2>&1", $salida, $error);

        //En caso de error lo muestro por pantalla para depurar mejor el código
        if ($error !== 0) {
            $errores[] = "Error al ejecutar el script de Python. Código de error: $error";
            foreach ($salida as $linea) {
                $errores[] = $linea;
            }
            $json_errores = json_encode($errores);

            // Paro la ejecución mostrando los errores si los hay
            dd($salida);
        } 

        // Elimino el archivo temporal después de usarlo
        unlink($archivo_temporal);


        // Devuelvo una salida confirmando que todo ha ido bien
        return response()->json(['salida' => "Comparativa entre clasificadores realizada con ÉXITO"]);
    } 
}
