<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contenido',
        'valoracion',
        'fecha',
        'medio',
    ];

    public function noticias()
    {
        return $this->belongsTo(Noticia::class,'id');
    }
}
