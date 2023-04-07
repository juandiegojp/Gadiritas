<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descripcion', 'precio', 'duracion',
        'max_personas', 'guia_id'
    ];


    public function comentario()
    {
        return $this->hasMany(Comentario::class, 'comentario_id');
    }

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id');
    }

    public function guia()
    {
        return $this->belongsTo(Guia::class, 'guia_id');
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class, 'reserva_id');
    }

}
