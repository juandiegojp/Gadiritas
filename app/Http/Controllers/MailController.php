<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\newReserva;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $mailData = [
            'title' => 'Correo de prueba. Reserva de actividad.',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to("juandiego.jurado@iesdonana.org")->send(new newReserva($mailData));

        dd("Email is sent successfully.");
    }
}
