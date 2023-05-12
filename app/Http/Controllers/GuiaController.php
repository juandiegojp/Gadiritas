<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Guia;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class GuiaController extends Controller
{
    /**
     * Obtiene todas los usuarios que son guias y retorna los datos obtenidos a la vista
     * del admin donde se ve, con más detalle, los guias.
     *
     * @return void
     */
    public function guias()
    {
        $guia = User::where('is_guia', true)->get();
        return view('admin.guias.index', [
            'guias' => $guia,
        ]);
    }

    /**
     * Devuelve a la vista index de los usuarios GUIAS todas las guias que tienen pendiente
     * del día actual. También devuelven las futuras.
     *
     * @return void
     */
    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;

        $fechaActual = Carbon::now()->toDateString();

        $reservasHoy = Reserva::select('actividad_id', 'hora', DB::raw('CAST(fecha AS date) AS fecha'), DB::raw('SUM(personas) AS personas'))
            ->with('actividad')
            ->whereHas('actividad', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->whereDate('fecha', '=', $fechaActual)
            ->groupBy('actividad_id', 'fecha', 'hora')
            ->orderBy('hora')
            ->paginate(4);

        $reservas = Reserva::select('actividad_id', 'hora', DB::raw('CAST(fecha AS date) AS fecha'), DB::raw('SUM(personas) AS personas'))
            ->with('actividad')
            ->whereHas('actividad', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->whereDate('fecha', '>', $fechaActual)
            ->groupBy('actividad_id', 'fecha', 'hora')
            ->orderBy('fecha')
            ->paginate(4);


        return view('guias.index', [
            'reservas' => $reservas,
            'reservasHoy' => $reservasHoy,
        ]);
    }

    /**
     * Devuelve los trabajos que ha compleado el usuario guia.
     * Muestra los trabajos pasasdos y, si es el día actual, también si su hora ha sido cumplida.
     *
     * @param  mixed $request
     * @return void
     */
    public function historialTrabajo()
    {
        $user = auth()->user();
        $userId = $user->id;

        $fechaActual = Carbon::now()->toDateString();
        $horaActual = Carbon::now()->toTimeString();

        $reservas = Reserva::select('actividad_id', 'hora', DB::raw('CAST(fecha AS date) AS fecha'))
            ->with('actividad')
            ->whereHas('actividad', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->whereRaw("CONCAT(fecha, ' ', hora) < '{$fechaActual} {$horaActual}'")
            ->groupBy('actividad_id', 'fecha', 'hora')
            ->orderBy('fecha', 'DESC')
            ->orderBy('hora', 'DESC')
            ->paginate(12);

        return view('guias.historial', [
            'reservas' => $reservas,
        ]);
    }
}
