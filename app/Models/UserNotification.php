<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    use HasFactory;


    protected $table = 'user_notification';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'noticia_id',
        'descripcion',
        'fecha',
        'estado',
    ];


    public function noticia()
    {
        return $this->belongsTo(Noticia::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
