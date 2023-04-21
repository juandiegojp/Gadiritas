<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Destino;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comarcas = Destino::select('comarca')->groupBy("comarca")->orderBy("comarca")->get();
        $destinos = Destino::select('nombre', 'comarca')->get();
        return view('gadiritas.index', [
            'comarcas' => $comarcas,
            'destinos' => $destinos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function busquedaActividades(Request $request)
    {
        if ($request->isMethod('get')) {
            $actividades = Actividad::all();
            $comarcas = Destino::select('comarca')->groupBy("comarca")->orderBy("comarca")->get();
            $destinos = Destino::select('nombre', 'comarca')->get();
            return view('gadiritas.resultados', [
                'actividades' => $actividades,
                'comarcas' => $comarcas,
                'destinos' => $destinos,
            ]);
        }
        $ciudades = Destino::whereRaw('LOWER(unaccent(nombre)) LIKE ?',
                                    ['%' . mb_strtolower(preg_replace('/[^\p{L}\p{N}\s]/u', '', $request->buscadorHome),
                                    'UTF-8') . '%'])->get();
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
            return view('gadiritas.resultados', compact('actividades'));
        } else {
            return view('gadiritas.resultados', ['mensaje' => 'No se encontraron actividades para la ciudad buscada']);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
