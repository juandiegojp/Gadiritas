<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'comarca', 'codigo_postal'
    ];


    /**
     * Relación del destino con la actividad.
     *
     * @return void
     */
    public function actividad()
    {
        return $this->hasMany(Actividad::class, 'destino_id', 'id');
    }
}
