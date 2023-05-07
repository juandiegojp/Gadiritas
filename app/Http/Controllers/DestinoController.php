<?php

namespace App\Http\Controllers;

use App\Models\Destino;
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
        return view('admin.destinos.create', []);
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
}
