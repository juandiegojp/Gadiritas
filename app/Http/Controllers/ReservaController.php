<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function crear_reserva(Request $request) {
        $hora = date('H:i:s', strtotime($request->hora));
        $n_reserva = Reserva::create([
            'actividad_id' => $request->act_id,
            'user_id' => $request->user()->id,
            'fecha' => $request->date,
            'hora' => $hora,
            'personas' => $request->n_personas,
        ]);

        return redirect('/index')->with('success', '¡La reserva se ha creado correctamente!');;
    }

    public function reservaUsers(Request $request) {
        $comarcas = Destino::select('comarca')
            ->groupBy('comarca')
            ->orderBy('comarca')
            ->get();
        $destinos = Destino::select('nombre', 'comarca')->get();
        $reservas = Reserva::where('user_id', $request->user()->id)->orderBy('id')->get();
        return view('gadiritas.reservas', compact('reservas', 'comarcas', 'destinos'));
    }

    public function borrarReserva(Request $request)
    {
        $reserva = $request->input('id');
        Reserva::where('id', $reserva)->delete();
        return redirect('/reservas');
    }
}
