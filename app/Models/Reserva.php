<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'actividad_id', 'user_id','fecha',
        'hora', 'personas', 'precio_total', 'pago_id'
    ];

    /**
     * Relación de la reserva con los usuarios.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación de la reserva con la actividad.
     *
     * @return void
     */
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
