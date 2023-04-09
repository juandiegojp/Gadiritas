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
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->tlf,
            'password' => Hash::make($request->password1),
            'is_admin' => $request->input('is_admin') ? "True" : "False"
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
            'telefono' => $request->tlf,
            'password' => Hash::make($request->password1),
            'is_admin' => $request->input('is_admin') ? "True" : "False"
        ]);

        return redirect('/guias/detalles/'. $guia->id);
    }

    public function borrarGuia(Guia $guia)
    {
        $guia->delete();
        return redirect('/guias');
    }


    // Creación y manipulación de los datos de destinos


    // Creación y manipulación de los datos de actividades
}
