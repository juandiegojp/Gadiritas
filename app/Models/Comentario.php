<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenido', 'user_id','actividad_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
