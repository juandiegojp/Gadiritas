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


    public function actividad()
    {
        return $this->hasMany(Actividad::class, 'actividad_id', 'id');
    }
}
