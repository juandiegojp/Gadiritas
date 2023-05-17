<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\newReserva;
use App\Models\Reserva;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Reserva $reserva)
    {
        $mailData = [
            'title' => '¡Gracias por reservas con nosotros!',
            'body' => 'Aquí abajo encontrará toda la información detallada de su reserva:',
            'titulo' => $reserva->actividad->titulo,
            'fecha' => $reserva->fecha,
            'hora' => $reserva->hora,
            'ubicación' => $reserva->actividad->direccion,
            'nPersonas' => $reserva->personas,
            'precio' => ($reserva->personas * $reserva->actividad->precio)
        ];

        Mail::to('juandiego.jurado@iesdonana.org')->send(new newReserva($mailData));
    }
}
