<?php

namespace App\Http\Controllers;

use App\Mail\altaGuia;
use Illuminate\Http\Request;
use App\Mail\newReserva;
use App\Mail\cancelarReserva;
use App\Models\Reserva;
use App\Models\User;
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
            'precio' => $reserva->precio_total,
        ];

        Mail::to('juandiego.jurado@iesdonana.org')->send(new newReserva($mailData));
    }

    public function cancelar()
    {
        $mailData = [
            'title' => 'Su reserva ha sido cancelada con éxito.',
            'body' => 'Lamentamos que no pueda asistir a nuestra actividad, esperamos volver a verle pronto.',
        ];

        Mail::to('juandiego.jurado@iesdonana.org')->send(new cancelarReserva($mailData));
    }

    public function altaGuia(User $usuario)
    {
        $mailData = [
            'title' => 'Has sido seleccionado y dado de alta en nuestro equipo de guias de Gadiritas.',
            'body' => 'Después de revisar su curriculum y ponernos en contacto con usted, has sido el candidato elegido para trabajar con nosotros
            y por ello le damos la bienvenida a nuestro equipo de guias.',
            'nombre' => $usuario->name,
            'email' => $usuario->email,
        ];

        Mail::to('juandiego.jurado@iesdonana.org')->send(new altaGuia($mailData));
    }
}
