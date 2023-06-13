<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Destino;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    /**
     * Muestra todos los destinos en el lado ADMIN.
     *
     * @return void
     */
    public function destinos()
    {
        $destino = Destino::all();
        return view('admin.destinos.index', [
            'destinos' => $destino,
        ]);
    }

    /**
     * Redirige al formulario para crear los destinos.
     *
     * @return void
     */
    public function destinosForm()
    {
        $comarcas = Destino::select('comarca')
            ->distinct()
            ->orderBy('comarca')
            ->pluck('comarca');

        return view('admin.destinos.create', ['comarcas' => $comarcas]);
    }

    /**
     * Guarda los datos proporcionados en el formulario para
     * añadirlos a la base de datos. Después de guardarlos,
     * se redirige a la sección de destinos.
     *
     * @param  mixed $request
     * @return void
     */
    public function storeDestinos(Request $request)
    {
        $n_destino = Destino::create([
            'nombre' => $request->nombre,
            'comarca' => $request->comarca,
            'codigo_postal' => $request->codigo_postal,
        ]);

        return redirect('/destinos');
    }

    /**
     * Redirige a la vista donde se puede ver los detalles de un destino
     * en concreto.
     *
     * @param  mixed $destino
     * @return void
     */
    public function datellesDestino(Destino $destino)
    {
        return view('admin.destinos.detalles', [
            'destino' => $destino,
        ]);
    }

    /**
     * Redirige al formulario donde pasan los datos para editar un destino.
     *
     * @param  mixed $destino
     * @return void
     */
    public function editarDestino(Destino $destino)
    {
        return view('admin.destinos.editar', [
            'destino' => $destino,
        ]);
    }

    /**
     * Actualizar en la base de datos los datos con los cambios en el destino.
     *
     * @param  mixed $request
     * @param  mixed $destino
     * @return void
     */
    public function updateDestino(Request $request, Destino $destino)
    {
        $destino->update([
            'nombre' => $request->nombre,
            'comarca' => $request->comarca,
            'codigo_postal' => $request->codigo_postal,
        ]);

        return redirect('/destinos');
    }

    /**
     * Borrar destino.
     *
     * @param  mixed $request
     * @return void
     */
    public function borrarDestino(Request $request)
    {
        $idDestino = $request->input('id');
        Destino::where('id', $idDestino)->delete();
        return redirect('/destinos');
    }

    public function destinosCheck(Request $request)
    {
        if ($request->ajax()) {
            $destino_id = $request->input('destino');
            $hora = $request->input('hora');
            $duracion = $request->input('duracion');

            $parse_hora = Carbon::createFromFormat('H:i', $hora)->setTimezone('Europe/Madrid');
            $hora_string = $parse_hora->format('H:i:s');
            $destino = Destino::findOrFail($destino_id);
            $disponibles = [];

            $users = User::whereHas('actividad', function ($query) use ($destino) {
                $query->where('destino_id', $destino->id);
            })
                ->where('is_guia', true)
                ->select('id', 'name')
                ->get();

            foreach ($users as $user) {
                $carbonHora = Carbon::createFromFormat('H:i:s', $hora_string);
                $horaActividadAntes = $carbonHora->subMinutes(30)->format('H:i:s');
                $horaActividadDespues = $carbonHora->addMinutes(60)->format('H:i:s');

                $actividadAsignada = Actividad::where('user_id', $user->id)
                    ->where(function ($query) use ($horaActividadAntes, $horaActividadDespues) {
                        $query->whereBetween('horas', [$horaActividadAntes, $horaActividadDespues]);
                    })->exists();

                if (!$actividadAsignada) {
                    array_push($disponibles, $user);
                }
            }

            if (!$disponibles) {
                $disponibles = User::whereDoesntHave('actividad')
                    ->where('is_guia', true)
                    ->select('id', 'name')
                    ->get();
            }
            return response()->json(['status' => $disponibles]);
        }
        return response()->json(['status' => 'Invalid request'], 400);
    }
}
