<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuiaController extends Controller
{
    public function guias()
    {
        $guia = Guia::all();
        return view('admin.guias.index', [
            'guias' => $guia,
        ]);
    }

    public function guiasForm()
    {
        return view('admin.guias.create', []);
    }

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

    public function datellesGuia(Guia $guia)
    {
        return view('admin.guias.detalles', [
            'guia' => $guia,
        ]);
    }

    public function editarGuia(Guia $guia)
    {
        return view('admin.guias.editar', [
            'guia' => $guia,
        ]);
    }

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

    public function borrarGuia(Guia $guia)
    {
        $guia->delete();
        return redirect('/guias');
    }
}
