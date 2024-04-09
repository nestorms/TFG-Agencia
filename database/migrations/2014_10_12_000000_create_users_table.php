<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //Alias para bigIncrements('id')      
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rol');
            $table->string('telefono',9)->nullable();
            $table->string('empresa')->nullable();
            $table->string('enlace')->nullable();
            $table->text('bio')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('palabras_clave')->nullable();
            $table->timestamps();
        });

        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->longText('contenido');
            $table->string('foto');
            $table->text('palabras_clave')->nullable();
            $table->integer('likes');
            $table->integer('guardados');
            $table->time('hora');
            $table->date('fecha');
            $table->foreignId('categoria_id')->constrained('categories');
            $table->foreignId('redactor_id')->constrained('users');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('contenido');
            $table->integer('valoracion');
            $table->date('fecha');
            $table->string('medio');

            $table->foreignId('noticia_id')->constrained('noticias');
        });

        

        Schema::create('user_noticia', function (Blueprint $table) {
            $table->foreignId('noticia_id')->constrained('noticias');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('recomendada')->default(false);
            $table->timestamps();
        });

        Schema::create('user_notification', function (Blueprint $table) {
            $table->foreignId('noticia_id')->constrained('noticias');
            $table->foreignId('user_id')->constrained('users');
            $table->string('estado');
            $table->date('fecha');
            $table->text('descripcion');
            $table->timestamps();
        });

        Schema::create('chats', function (Blueprint $table) {
            $table->foreignId('medio_id')->constrained('users');
            $table->foreignId('redactor_id')->constrained('users');
            $table->foreignId('remitente_id')->constrained('users');
            $table->time('hora');
            $table->date('fecha');
            $table->text('mensaje');
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('user_noticia');
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('users');
        Schema::dropIfExists('chats');
        Schema::dropIfExists('user_notification');
        
    }
};
