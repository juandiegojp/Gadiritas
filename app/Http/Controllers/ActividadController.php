<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Destino;
use App\Models\Guia;
use App\Models\Reserva;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    /**
     * Dirige a la vista donde se muestran todas las actividades existentes. Panel Admin.
     *
     * @return void
     */
    public function actividades()
    {
        $actividades = Actividad::all()->sortBy('destino_id');
        return view('admin.actividades.index', [
            'actividades' => $actividades,
        ]);
    }

    /**
     * Formulario para la creación de actividades. Panel Admin.
     *
     * @return void
     */
    public function actividadesForm()
    {
        $destinos = Destino::all();
        $guias = User::where('is_guia', true)->get();

        return view('admin.actividades.create', [
            'destinos' => $destinos,
            'guias' => $guias,
        ]);
    }

    /**
     * Guardar una nueva actividad en la base de datos.
     *
     * @param  mixed $request
     * @return void
     */
    public function storeActividades(Request $request)
    {
        $n_actividad = Actividad::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'duracion' => $request->duracion,
            'max_personas' => $request->max_personas,
            'user_id' => $request->user_id,
            'destino_id' => $request->destino_id,
            'direccion' => $request->direccion,
        ]);

        return redirect('/actividades/detalles/' . $n_actividad->id);
    }

    /**
     * Muestra en una vista los detalles de una actividad.
     *
     * @param  mixed $actividad
     * @return void
     */
    public function datellesActividad(Actividad $actividad)
    {
        return view('admin.actividades.detalles', [
            'actividad' => $actividad,
        ]);
    }

    /**
     * Formulario para editar los datos de una actividad.
     *
     * @param  mixed $actividad
     * @return void
     */
    public function editarActividad(Actividad $actividad)
    {
        $destinos = Destino::all();
        $guias = User::where('is_guia', true)->get();

        return view('admin.actividades.editar', [
            'destinos' => $destinos,
            'guias' => $guias,
            'actividad' => $actividad,
        ]);
    }

    /**
     * Actualiza los datos en la base de datos de una actividad
     *
     * @param  mixed $request
     * @param  mixed $actividad
     * @return void
     */
    public function updateActividad(Request $request, Actividad $actividad)
    {
        $actividad->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'duracion' => $request->duracion,
            'max_personas' => $request->max_personas,
            'user_id' => $request->user_id,
            'destino_id' => $request->destino_id,
            'direccion' => $request->direccion,
        ]);

        return redirect('actividades/detalles/' . $actividad->id);
    }

    /**
     * Borra una actividad.
     *
     * @param  mixed $actividad
     * @return void
     */
    public function borrarActividad(Actividad $actividad)
    {
        $actividad->delete();
        return redirect('/actividades');
    }

    /**
     * Busca la ciudad que se ha pasado por el input y en ese valor se buscará un resultado
     * parecido y sin tildes al que se ha pasado. Se comprobará que el resultado que contenga
     * un valor diferente de cero. Seguidamente se hará un bucle en el que se meterá todas las actividades
     * dentro de un array para luego devolvermelo a la vista que será la que muestre todos los resultados
     * encontrados en la base de datos.
     *
     * @param  mixed $request
     * @return void
     */
    public function busquedaActividades(Request $request)
    {
        $comarcas = Destino::select('comarca')
            ->groupBy('comarca')
            ->orderBy('comarca')
            ->get();
        $destinos = Destino::select('nombre', 'comarca')->get();
        $ciudades = Destino::whereRaw(
            'LOWER(unaccent(nombre)) LIKE ?',
            ['%' . mb_strtolower(preg_replace('/[^\p{L}\p{N}\s]/u', '', $request->buscadorHome), 'UTF-8') . '%']
        )->get();
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
                        'destino_id' => $actividad->destino_id,
                    ];
                }
            }
            return view('gadiritas.resultados', compact('actividades', 'comarcas', 'destinos', 'ciudades'));
        } else {
            return view('gadiritas.resultados', ['mensaje' => 'No se encontraron actividades para la ciudad buscada']);
        }
    }

    /**
     * Buscador de actividades usando el navbar. Hace lo mismo que la anterior función.
     *
     * @param  mixed $destino
     * @return void
     */
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
                    'destino_id' => $actividad->destino_id,
                ];
            }
        }
        return view('gadiritas.resultados', compact('actividades', 'comarcas', 'destinos')); // Devolver la vista con los resultados de la búsqueda
    }


    /**
     * Muestra en una vista los detalles de una actividad en concreto.
     *
     * @param  mixed $destino
     * @return void
     */
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


    /**
     * Comprueba la disponibilidad de una actividad en una fecha y hora
     * en concreto. Devuelve un array con el nº de personas disponibles para
     * las fechas seleccionadas.
     *
     * @param  mixed $request
     * @return void
     */
    public function actividadCheck(Request $request)
    {
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


    /**
     * Filtra los resultados en función de la opción que se haya seleccionado.
     *
     * @param  mixed $request
     * @return void
     */
    public function filtrar(Request $request)
    {
        $orden = $request->input('orden');
        $destino_id = $request->input('destino_id');
        $freeTour = $request->input('freeTour');

        $actividades = Actividad::where('destino_id', $destino_id);

        if ($freeTour) {
            $actividades->where('precio', 0);
        } else {
            switch ($orden) {
                case 'barato':
                    $actividades->orderBy('precio', 'asc');
                    break;
                case 'caro':
                    $actividades->orderBy('precio', 'desc');
                    break;
                case 'relevancia':
                    // ordenar por defecto, no hacer nada
                    break;
                case 'nuevas':
                    $actividades->orderBy('created_at', 'desc');
                    break;
                case 'nombreASC':
                    $actividades->orderBy('titulo', 'asc');
                    break;
                case 'nombreDESC':
                    $actividades->orderBy('titulo', 'desc');
                    break;
            }
        }

        $actividades = $actividades->get();

        return response()->json([
            'status' => 'success',
            'actividades' => $actividades,
        ]);
    }

    public function generatePDF($id)
    {
        $actividad = Actividad::findOrFail($id);

        $data = [
            'actividad' => $actividad
        ];

        $pdf = PDF::loadView('gadiritas.itinerario', $data);

        return $pdf->stream($actividad->titulo . '.pdf');
    }
}
