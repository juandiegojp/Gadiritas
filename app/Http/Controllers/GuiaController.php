<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

$reservas = Reserva::select('actividad_id', DB::raw('MAX(hora) AS ultima_hora'))
            ->with('actividad')
            ->whereHas('actividad', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->groupBy('actividad_id')
            ->orderBy('actividad_id')
            ->get();

        return view('guias.index', [
            'reservas' => $reservas,
        ]);
    }
}
