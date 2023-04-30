<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'apellidos','tlf',
        'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];

    /**
     * Relación del guia con las actividades.
     *
     * @return void
     */
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
