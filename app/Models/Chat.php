<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Especifica las claves primarias compuestas
    protected $primaryKey = ['medio_id', 'redactor_id'];

    // Indica a Laravel que las claves primarias no son autoincrementales
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'medio_id',
        'redactor_id',
        'mensaje',
        'hora',
        'fecha',
    ];

    public function redactor()
    {
        return $this->hasMany(User::class, 'redactor_id');
    }

    public function medio()
    {
        return $this->belongsTo(User::class, 'medio_id');
    }
}
