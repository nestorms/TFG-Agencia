<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use App\Models\Noticia;
use App\Models\User;
use App\Models\Category;
use App\Models\UserNoticia;
use App\Models\UserNotification;
use Elastic\Elasticsearch\Client;

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
        $noticias = Noticia::limit(30)->get();

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

        // Realizar la consulta a Elasticsearch
        $response = $this->elasticsearch->search($params);

        // Obtener los resultados de la consulta
        $hits = $response['hits']['hits'];

        // Procesar los resultados según sea necesario
        $noticias = [];
        foreach ($hits as $hit) {
            // Acceder a la fuente (_source) de cada documento
            $source = $hit['_source'];
            $score = $hit['_score'];
            // Agregar la noticia a la lista de noticias
            $noticias[] = Noticia::findOrFail($source['id']);

            /*$noticias[] = [
                'titulo' => $source['titulo'],
                'descripcion' => $source['descripcion'],
                'score' => $score,
                'id_medio' => $source['id_medio'],
            ];*/
        }

        // Retornar las noticias encontradas
        return view('index', ['noticias' => $noticias, 'busqueda' => $request->busqueda]);
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

        $noticias = Noticia::where('id', '>=', 31)->get();
        UserNoticia::where('recomendada',true)->delete();


        foreach($noticias as $noticia){

            $params = [
                'index' => 'noticias', // Nombre del índice en Elasticsearch
                'body' => [
                    'query' => [
                        "bool" => [
                            "should" => [
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
            $noticias = [];
            foreach ($hits as $hit) {
                // Acceder a la fuente (_source) de cada documento
                $source = $hit['_source'];
                $score = $hit['_score'];
                // Agregar la noticia a la lista de noticias
                $noticias[] = [
                    /*'titulo' => $source['titulo'],
                    'descripcion' => $source['descripcion'],*/
                    'score' => $score,
                    'id_medio' => $source['id_medio'],
                ];


                $umbralBM25=5.0;

                if ($score >= $umbralBM25) {
                    // El score BM25 cumple con el umbral, almacenar la recomendación
                    $source = $hit['_source'];
                    $user_id = $source['id_medio'];
    
                    UserNoticia::create([
                        'user_id' => $user_id,
                        'noticia_id' => $noticia->id,
                        'recomendada' => true,
                    ]);

                    UserNotification::create([
                        'user_id' => $user_id,
                        'noticia_id' => $noticia->id,
                        'estado' => 'pendiente',
                        'descripcion' => "Tienes una nueva noticia recomendada de " . $noticia->category->nombre,
                        'fecha' => date('Y-m-d'),
                    ]);
                }
            }
        }
        

        // Retornar las noticias encontradas
        return response()->json(['noticias' => $noticias]);
    }

    public function index()
    {
        // Llama a la función para obtener las noticias de la API
        $noticias = Noticia::limit(30)->get();

        // Pasa los datos recuperados a la vista
        return view('index', ['noticias' => $noticias]);
    }

    public function show($id){

        $noticia = Noticia::findOrFail($id);

        return view('noticia', ['noticia' => $noticia]);
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
            
            // Busco la fila en la tabla intermedia user_noticia
            UserNoticia::where('user_id', $userId)->where('noticia_id', $id)->where('recomendada', false)->delete();

            $noticia->guardados--;
            $noticia->save();

            $personal=UserNoticia::where('user_id',$userId)->where('recomendada', false)->paginate(3);

            return view('personal', ['personal' => $personal]);
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

    
}
