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
            $table->text('contenido');
            $table->string('foto');
            $table->text('palabras_clave')->nullable();
            $table->integer('likes');
            $table->time('hora');
            $table->date('fecha');
            $table->foreignId('categoria_id')->constrained('categories');
            $table->foreignId('redactor_id')->constrained('users');
            $table->timestamps();
        });

        

        Schema::create('user_noticia', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('noticia_id');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('noticia_id')->references('id')->on('noticias')->onDelete('cascade');
            $table->primary(['user_id', 'noticia_id']);
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('user_noticia');
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('users');
        
        
    }
};
