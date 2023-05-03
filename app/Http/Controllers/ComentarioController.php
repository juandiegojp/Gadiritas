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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comentario = Comentario::create([
            'contenido' => $request->contenido,
            'user_id' => $request->user()->id,
            'actividad_id' => $request->act_id,
        ]);

        return redirect('/detalles/' . $request->act_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id); // Obtener el comentario por su id

        $comentario->contenido = $request->input('contenido'); // Actualizar el contenido del comentario con el valor del campo 'contenido' enviado por la petición

        $comentario->save(); // Guardar los cambios en la base de datos

        return redirect('/detalles/' . $comentario->actividad->id); // Redirigir a la página de detalles de la actividad a la que pertenece el comentario
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
