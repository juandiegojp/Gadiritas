<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Destino;
use App\Models\Guia;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    public function actividades()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index', [
            'actividades' => $actividades,
        ]);
    }

    public function actividadesForm()
    {
        $destinos = Destino::all();
        $guias = Guia::all();

        return view('admin.actividades.create', [
            'destinos' => $destinos,
            'guias' => $guias,
        ]);
    }

    public function storeActividades(Request $request)
    {
        $n_actividad = Actividad::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'duracion' => $request->duracion,
            'max_personas' => $request->max_personas,
            'guia_id' => $request->guia_id,
            'destino_id' => $request->destino_id,
        ]);

        return redirect('/actividades/detalles/'. $n_actividad->id);
    }

    public function datellesActividad(Actividad $actividad)
    {
        return view('admin.actividades.detalles', [
            'actividad' => $actividad,
        ]);
    }

    public function editarActividad(Actividad $actividad)
    {
        return view('admin.actividades.editar', [
            'actividad' => $actividad,
        ]);
    }

    public function updateActividad(Request $request, Actividad $actividad)
    {
        $actividad->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'duracion' => $request->duracion,
            'max_personas' => $request->max_personas,
            'guia_id' => $request->guia_id,
            'destino_id' => $request->destino_id,
        ]);

        return redirect('/actividad/detalles/'. $actividad->id);
    }

    public function borrarActividad(Actividad $actividad)
    {
        $actividad->delete();
        return redirect('/actividades');
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

    public function actividadesResultados($destino)
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


    public function actividadCheck(Request $request) {
        if ($request->ajax()) {
            $fecha = $request->input('date');
            $hora = $request->input('hora');
            $actividad_id = $request->input('act_id');


            $parse_date = Carbon::createFromFormat('d-m-Y', $fecha)->setTimezone('Europe/Madrid');
            $date_string = $parse_date->format('Y-m-d');
            $parse_hora = Carbon::createFromFormat('H:i', $hora)->setTimezone('Europe/Madrid');
            $hora_string = $parse_hora->format('H:i:s');

            $actividad = Actividad::findOrFail($actividad_id);
            $nPersonasMax = $actividad->max_personas;
            $actividad_fecha = Reserva::where('actividad_id', $actividad->id)
                                        ->where('fecha', $date_string)
                                        ->where('hora', $hora_string)
                                        ->get();

            // Suma el número de personas de todas las reservas en la fecha específica
            $nPersonasReservadas = $actividad_fecha->sum('personas');

            // Calcula la diferencia entre el número máximo de personas y el número de personas reservadas
            $diferencia = $nPersonasMax - $nPersonasReservadas;
            $personas = [];
            for ($p = 1; $p <= $diferencia; $p++) {
                if (!in_array($p, $personas)) {
                    array_push($personas, $p);
                }
            }
            return response()->json(['status' => $personas]);
        }
        return response()->json(['status' => 'Invalid request'], 400);
    }
}
