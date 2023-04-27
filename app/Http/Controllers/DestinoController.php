<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    public function destinos()
    {
        $destino = Destino::all();
        return view('admin.destinos.index', [
            'destinos' => $destino,
        ]);
    }

    public function destinosForm()
    {
        return view('admin.destinos.create', []);
    }

    public function storeDestinos(Request $request)
    {
        $n_destino = Destino::create([
            'nombre' => $request->nombre,
            'comarca' => $request->comarca,
            'codigo_postal' => $request->codigo_postal,
        ]);

        return redirect('/destinos');
    }

    public function datellesDestino(Destino $destino)
    {
        return view('admin.destinos.detalles', [
            'destino' => $destino,
        ]);
    }

    public function editarDestino(Destino $destino)
    {
        return view('admin.destinos.editar', [
            'destino' => $destino,
        ]);
    }

    public function updateDestino(Request $request, Destino $destino)
    {
        $destino->update([
            'nombre' => $request->nombre,
            'comarca' => $request->comarca,
            'codigo_postal' => $request->codigo_postal,
        ]);

        return redirect('/destinos/detalles/'. $destino->id);
    }

    public function borrarDestino(Request $request)
    {
        $idDestino = $request->input('id');
        Destino::where('id', $idDestino)->delete();
        return redirect('/destinos');
    }
}
