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

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
