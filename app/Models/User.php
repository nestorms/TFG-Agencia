<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
        'rol',
        'telefono',
        'enlace',
        'empresa',

    ];


    //Los redactores pueden tener varias noticias asociadas
    public function noticias_redactor()
    {
        return $this->hasMany(Noticia::class, 'redactor_id');
    }

    //Los medios pueden tener seleccionadas muchas noticias
    public function noticias_medio()
    {
        return $this->hasMany(UserNoticia::class);
    }

    //Los medios pueden tener asociadas muchas notificaciones
    public function notificaciones_medio()
    {
        return $this->hasMany(UserNotification::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function setPasswordAttribute($value){ //La funcion ha de llamarse así para que Laravel y Eloquent lo entienda --> set + nombre atributo + Attribute
        $this->attributes['password'] = bcrypt($value);
    }
}
