<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Noticia;

class ExampleTest extends TestCase
{

    //use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_userLoginOK()
    {
        //Comando para que no de errores por intentar acceder a la API
        $this->withoutMiddleware();

        // Crea un usuario
        $user = User::where('email', 'nestor@ex.com')->first();

        // Intenta iniciar sesión con las credenciales correctas
        $response = $this->post('/login', [
            'email' => 'nestor@ex.com',
            'password' => 'nestor',
        ]);

        // Asegúrate de que el usuario esté autenticado
        $this->assertAuthenticatedAs($user);

        // Verifica que el usuario sea redirigido a la página de inicio
        $response->assertRedirect('/');
    }

    public function test_userComment()
    {
        //Comando para que no de errores por intentar acceder a la API
        $this->withoutMiddleware();

        //Selecciono una noticia
        $idNoticia=1;

        // Selecciono a un medio
        $user = User::where('email', 'migue@ex.com')->first();


        // Busco la noticia en la agencia
        $noticia = Noticia::findOrFail($idNoticia);

        // Intento iniciar sesión con las credenciales del medio
        $response = $this->post('/login', [
            'email' => 'migue@ex.com',
            'password' => 'migue1234',
        ]);

        // Me aseguro de que el usuario esté autenticado
        $this->assertAuthenticatedAs($user);

        // Verifico que el usuario sea redirigido a la página de inicio
        $response->assertRedirect('/');

        // Realiza un comentario en la noticia
        $commentData = [
            'comentario' => 'Comentario de prueba en testeo',
            'valoracion' => 4,
            'noticia_id' => $noticia->id,
        ];

        //Navego hasta la primera noticia de la agencia
        $ruta='/noticia/' . $noticia->id;
        $response = $this->get($ruta);

        // Hago que el usuario autenticado realice la solicitud
        $this->actingAs($user)->post("/comentar", $commentData);

        // Verifico que el comentario se haya creado en la base de datos
        $this->assertDatabaseHas('comments', [
            'noticia_id' => $noticia->id,
            'valoracion' => 4,
            'contenido' => 'Comentario de prueba en testeo',
        ]);
    }

    public function test_categoriasOK()
    {
        // Accedo a la ruta donde se muestran las categorias
        $response = $this->get('/categorias');

        // Verifico que la respuesta sea exitosa
        $response->assertStatus(200);

        // Obtener el contenido de la respuesta
        $content = $response->getContent();

        // Verifico si hay al menos 3 elementos con la clase 'news-card'
        preg_match_all('/<div class="card news-card h-100">/', $content, $matches);
        $this->assertGreaterThanOrEqual(3, count($matches[0]));

        //Verifico además que veo cierto texto en la página 
        $response->assertSee('Ver más noticias');
    }


    public function test_crearNoticiaOK()
    {
        //Comando para que no de errores por intentar acceder a la API
        $this->withoutMiddleware();

        // Selecciono a un medio
        $user = User::where('email', 'nestor@ex.com')->first();

        // Intento iniciar sesión con las credenciales del admin
        $response = $this->post('/login', [
            'email' => 'nestor@ex.com',
            'password' => 'nestor',
        ]);

        // Me aseguro de que el admin esté autenticado y pueda acceder a la administración
        $this->assertAuthenticatedAs($user);

        $response = $this->get('/administracion');
        $response->assertStatus(200);


        //Selecciono una noticia
        $idNoticia=1;

        // Busco la noticia en la agencia para coger su foto
        $noticia = Noticia::findOrFail($idNoticia);

        // Datos para la noticia
        $noticiaData = [
            'titulo' => 'Titulo de prueba',
            'descripcion' => 'Descripcion de prueba',
            'foto' => $noticia->foto,
            'categoria_id' => 1,
            'hora' => date('H:i:s'),
            'fecha' => date('Y-m-d'),
            'likes' => random_int(10,150),
            'guardados' => random_int(10,150),
            'contenido' => 'Contenido de prueba para el test',
            'redactor_id' => $user->id,
        ];


        // Hago que el admin autenticado realice la solicitud
        $this->actingAs($user)->post("/crear_noticia", $noticiaData);

        // Verifico que la noticia se haya creado en la base de datos
        $this->assertDatabaseHas('noticias', [
            'redactor_id' => $user->id,
            'contenido' => 'Contenido de prueba para el test',
            'categoria_id' => '1',
        ]);
    }
}
