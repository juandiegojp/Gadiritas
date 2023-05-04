<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Actividad extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'titulo', 'descripcion', 'precio', 'duracion',
        'max_personas', 'guia_id', 'destino_id'
    ];


    /**
     * Relación de actividad con los comentarios.
     *
     * @return void
     */
    public function comentario()
    {
        return $this->hasMany(Comentario::class);
    }

    /**
     * Relación de actividad con los destinos.
     *
     * @return void
     */
    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id', 'id');
    }

    /**
     * Relación de actividad con los guias.
     *
     * @return void
     */
    public function guia()
    {
        return $this->belongsTo(Guia::class, 'guia_id', 'id');
    }

    /**
     * Relación de actividad con las reservas.
     *
     * @return void
     */
    public function reserva()
    {
        return $this->hasMany(Reserva::class, 'reserva_id', 'id');
    }

    /**
     * Función que uso para facilitar la búsqueda de actividades en
     * función de la ciudad que se busque.
     *
     * @return void
     */
    public function toSearchableArray()
    {
        return [
            'titulo' => $this->titulo,
            'destino_id' => $this->destino_id
        ];
    }

}
