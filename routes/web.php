<?php

use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
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


/********************   INICIO DE SESIÓN ********************/
Route::get('/registro', [UserController::class,'registro']);
Route::post('/registro', [UserController::class,'store']);

Route::view('/login', 'login');
Route::post('/login', [UserController::class,'login']);

Route::get('/logout', [UserController::class,'logout']);


/********************   NOTICIAS  ********************/
Route::get('/', [NoticiaController::class,'index']);
Route::get('/noticia/{id}', [NoticiaController::class,'show'])->name('noticias.show');

Route::post('/noticias/{id}/like', [NoticiaController::class, 'like'])->name('noticias.like');
Route::post('/noticias/{id}/unlike', [NoticiaController::class, 'unlike'])->name('noticias.unlike');
//Route::post('/noticias/{id}/guardar', [NoticiaController::class, 'guardar'])->name('noticias.guardar');
