<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Comentario;
use App\Models\Destino;
use App\Models\Guia;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();
        $comentarios = Comentario::all();
        $destinos = Destino::all();
        $guias = Guia::all();
        $reservas = Reserva::all();
        $users = User::all();

        return view('admin.index', [
            'actividades' => $actividades,
            'comentarios' => $comentarios,
            'destinos' => $destinos,
            'guias' => $guias,
            'reservas' => $reservas,
            'usuarios' => $users,
        ]);
    }


    // Creación y manipulación de los datos de usuarios

    public function usuarios()
    {
        $reservas = Reserva::all();
        $users = User::all();
        return view('admin.usuarios.index', [
            'reservas' => $reservas,
            'usuarios' => $users,
        ]);
    }

    public function usuariosForm()
    {
        return view('admin.usuarios.create', []);
    }

    public function storeUsuarios(Request $request)
    {
        $n_usuario = User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->tlf,
            'password' => Hash::make($request->password1),
            'is_admin' => $request->input('is_admin') ? "True" : "False"
        ]);

        return redirect('/usuarios/detalles/'. $n_usuario->id);
    }

    public function datellesUsuario(User $usuario)
    {
        return view('admin.usuarios.detalles', [
            'usuario' => $usuario,
        ]);
    }

    public function editarUsuario(User $usuario)
    {
        return view('admin.usuarios.editar', [
            'usuario' => $usuario,
        ]);
    }

    public function updateUsuario(Request $request, User $usuario)
    {
        $usuario->update([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->tlf,
            'password' => Hash::make($request->password1),
            'is_admin' => $request->input('is_admin') ? "True" : "False"
        ]);

        return redirect('/usuarios/detalles/'. $usuario->id);
    }

    public function borrarUsuario(User $usuario)
    {
        $usuario->delete();
        return redirect('/usuarios');
    }


    // Creación y manipulación de los datos de guias

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
            'name' => $request->name,
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


    // Creación y manipulación de los datos de destinos

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


    // Creación y manipulación de los datos de actividades

    public function actividades()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index', [
            'actividades' => $actividades,
        ]);
    }

    public function actividadesForm()
    {
        return view('admin.actividades.create', []);
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


}
