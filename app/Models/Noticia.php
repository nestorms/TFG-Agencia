<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;



    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'contenido',
        'foto',
        'likes',
        'palabras_clave',
        'fecha',
        'hora',
        'redactor_id',
        'categoria_id',
        'guardados',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'categoria_id');
    }

    public function redactor()
    {
        return $this->belongsTo(User::class,'redactor_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comment::class);
    }

    public function seleccionadas()
    {
        return $this->hasMany(UserNoticia::class);
    }

    public function notificadas()
    {
        return $this->hasMany(UserNotification::class);
    }
}
