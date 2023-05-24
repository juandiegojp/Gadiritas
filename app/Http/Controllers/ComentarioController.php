<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Crear un comentario nuevo.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $comentario = Comentario::create([
                'contenido' => $request->input('contenido'),
                'user_id' => $request->user()->id,
                'actividad_id' => $request->input('actividadId'),
            ]);
            $nombre = $comentario->user->name;
            $apellidos = $comentario->user->apellidos;
            return response()->json(['status' => $comentario, 'nombre' => $nombre, 'apellidos' => $apellidos]);
        }
        return response()->json(['status' => 'Invalid request'], 400);
    }

    /**
     * Actualiza un comentario de la base de datos.
     */
    public function update(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id); // Obtener el comentario por su id

        $comentario->contenido = $request->input('contenido'); // Actualizar el contenido del comentario con el valor del campo 'contenido' enviado por la petición

        $comentario->save(); // Guardar los cambios en la base de datos

        return redirect('/detalles/' . $comentario->actividad->id); // Redirigir a la página de detalles de la actividad a la que pertenece el comentario
    }

    /**
     * Borra un comentario en concreto de la base de datos.
     */
    public function destroy(Request $request)
    {
        if (!$request->isMethod('post')) {
            return redirect()
                ->back()
                ->with('error', 'Solicitud no permitida');
        }

        $idComentario = $request->input('comentarioID');
        Comentario::where('id', $idComentario)->delete();
        return redirect()->back();
    }
}
