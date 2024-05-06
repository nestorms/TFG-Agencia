<?php

use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\CategoryController;
use Illuminate\Auth\Events\Login;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/','index');
Route::get('/recomendadas/{id}', [NoticiaController::class,'noticiasRecomendadas']);
Route::get('/recientes', [NoticiaController::class,'noticiasRecientes']);


/********************   INICIO DE SESIÓN ********************/
Route::get('/registro', [UserController::class,'registro']);
Route::post('/registro', [UserController::class,'store']);

Route::view('/login', 'login');
Route::post('/login', [UserController::class,'login']);

Route::get('/logout', [UserController::class,'logout']);


/********************   NOTICIAS  ********************/
Route::get('/', [NoticiaController::class,'index'])->name('index');
Route::get('/noticia/{id}', [NoticiaController::class,'show'])->name('noticias.show');
Route::get('/noticia/{id}/notificar', [NoticiaController::class,'showNotification']);
Route::get('/eliminar_notificacion/{id}', [NoticiaController::class,'deleteNotification']);
Route::get('/crear_noticia', [NoticiaController::class,'publicar']);
Route::post('/crear_noticia', [NoticiaController::class,'create']);

Route::post('/clasificar', [NoticiaController::class,'clasificar']);
Route::get('/entrenar_modelo', [NoticiaController::class,'entrenarModelo']);

Route::post('/noticias/{id}/like', [NoticiaController::class, 'like'])->name('noticias.like');
Route::post('/noticias/{id}/unlike', [NoticiaController::class, 'unlike'])->name('noticias.unlike');
Route::post('/noticias/{id}/save', [NoticiaController::class, 'save'])->name('noticias.save');
Route::post('/noticias/{id}/unsave', [NoticiaController::class, 'unsave'])->name('noticias.unsave');



/********************   ADMINISTRACIÓN  ********************/
Route::get('/administracion', [UserController::class,'administracion'])->name('administracion');
Route::get('/modificar_noticia/{id}', [NoticiaController::class, 'modificar']);
Route::post('/modificar_noticia/{id}', [NoticiaController::class, 'update']);
Route::get('/eliminar_noticia/{id}', [NoticiaController::class, 'delete']);

Route::get('/modificar_categoria/{id}', [CategoryController::class, 'modificar']);
Route::post('/modificar_categoria/{id}', [CategoryController::class, 'update']);
Route::get('/eliminar_categoria/{id}', [CategoryController::class, 'delete']);

Route::get('/modificar_comentario/{id}', [CommentController::class, 'modificar']);
Route::post('/modificar_comentario/{id}', [CommentController::class, 'update']);
Route::get('/eliminar_comentario/{id}', [CommentController::class, 'delete']);

Route::get('/modificar_user/{id}', [UserController::class, 'modificar']);
Route::post('/modificar_user/{id}', [UserController::class, 'update']);
Route::get('/eliminar_user/{id}', [UserController::class, 'delete']);


Route::view('/crear_redactor', 'crear_redactor');
Route::view('/crear_medio', 'crear_medio');
Route::view('/crear_categoria', 'crear_categoria');
Route::post('/crear_redactor', [UserController::class, 'crearRedactor']);
Route::post('/crear_medio', [UserController::class, 'crearMedio']);
Route::post('/crear_categoria', [CategoryController::class, 'create']);


/********************   SECCIÓN PERSONAL  ********************/
Route::get('/personal/{id}', [UserController::class, 'personal']);
Route::get('/personal/{id}/filtrar/{campo}/{id_campo}', [UserController::class, 'filtrarPersonal']);
Route::get('/noticias/{id}/unsave_personal', [NoticiaController::class, 'unsave_personal']);


Route::get('/personal/{id}/cluster', [UserController::class, 'cluster']);

Route::get('/config/{id}', [UserController::class, 'config'])->name('config');
Route::post('/config/{id}', [UserController::class, 'modificarPerfil']);


/********************   SECCIÓN CATEGORIAS  ********************/
Route::get('/categorias', [NoticiaController::class, 'mostrarCategorias']);
Route::get('/categorias/{id}', [NoticiaController::class, 'mostrarNoticiasCategoria']);



/********************   DESCARGA DE NOTICIAS  ********************/
Route::get('/noticias/{id}/descargarPDF', [NoticiaController::class, 'descargarPDF']);
Route::get('/noticias/{id}/descargarJSON', [NoticiaController::class, 'descargarJSON']);


/********************   COMENTARIOS  ********************/
Route::post('/comentar', [CommentController::class,'store'])->name('comentar.store');



/********************   INDEXACION  ********************/
Route::get('/indexar-noticias', [NoticiaController::class, 'indexarNoticias']);
Route::get('/indexar-principal', [NoticiaController::class, 'indexarPrincipal']);
Route::get('/recomendar', [NoticiaController::class, 'recomendar']);
Route::post('/buscadorIndex', [NoticiaController::class, 'buscadorIndex']);




/********************   CHATS Y MENSAJES  ********************/
Route::get('/mensajes/{id}', [UserController::class, 'showMensajes']);
Route::get('/chat/{id}', [UserController::class, 'showChat'])->name('chat');
Route::post('/chat/{id}', [UserController::class, 'enviarMensaje']);