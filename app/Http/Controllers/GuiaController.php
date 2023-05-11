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
            ->orderBy('actividad_id')
            ->get();

        $reservas = Reserva::select('actividad_id', DB::raw('CAST(fecha AS date) AS fecha'), DB::raw('SUM(personas) AS personas'))
            ->with('actividad')
            ->whereHas('actividad', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->whereDate('fecha', '>', $fechaActual)
            ->groupBy('actividad_id', 'fecha')
            ->orderBy('fecha')
            ->paginate(4); // Especifica la cantidad de elementos por página que deseas mostrar


        return view('guias.index', [
            'reservas' => $reservas,
            'reservasHoy' => $reservasHoy,
        ]);
    }
}
