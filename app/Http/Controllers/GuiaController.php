<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use App\Models\User;
use Illuminate\Http\Request;
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

    /**
     * Redirige la vista de la creación de los guias.
     *
     * @return void
     */
    public function guiasForm()
    {
        return view('admin.guias.create', []);
    }

    /**
     * Almacena en la base de datos todos los datos obtenidos del formulario
     * de creación de guias. Después de almacenarlos, es redirigido a la sección
     * de detalles del guia recién creado.
     *
     * @param  mixed $request
     * @return void
     */
    public function storeGuias(Request $request)
    {
        $n_usuario = Guia::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'tlf' => $request->tlf,
            'password' => Hash::make($request->password1),
        ]);

        return redirect('/guias/detalles/'. $n_usuario->id);
    }

    /**
     * Vista con los detalles de un guia. La id del guia se obtiene por GET.
     *
     * @param  mixed $guia
     * @return void
     */
    public function datellesGuia(Guia $guia)
    {
        return view('admin.guias.detalles', [
            'guia' => $guia,
        ]);
    }

    /**
     * Redirige a la vista donde se procede a editar los datos del guia.
     *
     * @param  mixed $guia
     * @return void
     */
    public function editarGuia(Guia $guia)
    {
        return view('admin.guias.editar', [
            'guia' => $guia,
        ]);
    }

    /**
     * Actualizar los datos en la base de datos con los datos pasados en el formulario.
     *
     * @param  mixed $request
     * @param  mixed $guia
     * @return void
     */
    public function updateGuia(Request $request, Guia $guia)
    {
        $guia->update([
            'nombre' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'tlf' => $request->tlf,
            'password' => Hash::make($request->password1),
        ]);

        return redirect('/guias/detalles/'. $guia->id);
    }

    /**
     * Borrar guia.
     *
     * @param  mixed $guia
     * @return void
     */
    public function borrarGuia(Guia $guia)
    {
        $guia->delete();
        return redirect('/guias');
    }
}
