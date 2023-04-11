<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descripcion', 'precio', 'duracion',
        'max_personas', 'guia_id', 'destino_id'
    ];


    public function comentario()
    {
        return $this->hasMany(Comentario::class, 'comentario_id', 'id');
    }

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id', 'id');
    }

    public function guia()
    {
        return $this->belongsTo(Guia::class, 'guia_id', 'id');
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class, 'reserva_id', 'id');
    }

}
