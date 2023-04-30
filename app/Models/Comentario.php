<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenido', 'user_id','actividad_id',
        'positivo', 'negativo'
    ];

    /**
     * Relación de los comentarios con los usuarios.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación de comentarios con actividad.
     *
     * @return void
     */
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
