<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Destino;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Time;

class UsuariosController extends Controller
{
    public function index()
    {
        $comarcas = Destino::select('comarca')
            ->groupBy('comarca')
            ->orderBy('comarca')
            ->get();
        $destinos = Destino::select('nombre', 'comarca')->get();
        return view('gadiritas.index', [
            'comarcas' => $comarcas,
            'destinos' => $destinos,
        ]);
    }

    public function busquedaActividades(Request $request)
    {
        $comarcas = Destino::select('comarca')
            ->groupBy('comarca')
            ->orderBy('comarca')
            ->get();
        $destinos = Destino::select('nombre', 'comarca')->get();
        $ciudades = Destino::whereRaw('LOWER(unaccent(nombre)) LIKE ?', ['%' . mb_strtolower(preg_replace('/[^\p{L}\p{N}\s]/u', '', $request->buscadorHome), 'UTF-8') . '%'])->get();
        if ($ciudades->isNotEmpty()) {
            $actividades = [];
            foreach ($ciudades as $ciudad) {
                foreach ($ciudad->actividad as $actividad) {
                    $actividades[] = [
                        'id' => $actividad->id,
                        'titulo' => $actividad->titulo,
                        'descripcion' => $actividad->descripcion,
                        'precio' => $actividad->precio,
                        'duracion' => $actividad->duracion,
                        'max_personas' => $actividad->max_personas,
                        'guia_id' => $actividad->guia_id,
                    ];
                }
            }
            return view('gadiritas.resultados', compact('actividades', 'comarcas', 'destinos'));
        } else {
            return view('gadiritas.resultados', ['mensaje' => 'No se encontraron actividades para la ciudad buscada']);
        }
    }

    public function actividades($destino)
    {
        $comarcas = Destino::select('comarca')
            ->groupBy('comarca')
            ->orderBy('comarca')
            ->get();
        $destinos = Destino::select('nombre', 'comarca')->get();
        $ciudades = Destino::where('nombre', $destino)->get();
        $actividades = [];
        foreach ($ciudades as $ciudad) {
            foreach ($ciudad->actividad as $actividad) {
                $actividades[] = [
                    'id' => $actividad->id,
                    'titulo' => $actividad->titulo,
                    'descripcion' => $actividad->descripcion,
                    'precio' => $actividad->precio,
                    'duracion' => $actividad->duracion,
                    'max_personas' => $actividad->max_personas,
                    'guia_id' => $actividad->guia_id,
                ];
            }
        }
        return view('gadiritas.resultados', compact('actividades', 'comarcas', 'destinos')); // Devolver la vista con los resultados de la búsqueda
    }

    public function detalles($destino)
    {
        $actividad = Actividad::find($destino);
        $destinos = Destino::select('nombre', 'comarca')->get();
        $comarcas = Destino::select('comarca')
        ->groupBy('comarca')
        ->orderBy('comarca')
        ->get();
        return view('gadiritas.detalles', compact('actividad', 'comarcas', 'destinos'));
    }

    public function crear_reserva(Request $request) {
        $hora = date('H:i:s', strtotime($request->hora));
        $n_reserva = Reserva::create([
            'actividad_id' => $request->act_id,
            'user_id' => $request->user()->id,
            'fecha' => $request->date,
            'hora' => $hora,
            'personas' => $request->n_personas,
        ]);

        return redirect('/index');
    }

}
