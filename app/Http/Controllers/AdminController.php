<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Comentario;
use App\Models\Destino;
use App\Models\Empleo;
use App\Models\Guia;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Mostrar todos los datos en el home de admin.
     *
     * @return void
     */
    public function index()
    {
        $fechaActual = Carbon::now()->toDateString();

        $actividades = Actividad::orderBy('created_at', 'desc')->get();
        $comentarios = Comentario::orderBy('created_at', 'desc')->get();
        $destinos = Destino::orderBy('created_at', 'desc')->get();
        $guias = Guia::orderBy('created_at', 'desc')->get();
        $reservas = Reserva::whereDate('fecha', '=', $fechaActual)->orderBy('created_at', 'desc')->paginate(10);
        $users = User::whereDate('created_at', '=', $fechaActual)->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.index', [
            'actividades' => $actividades,
            'comentarios' => $comentarios,
            'destinos' => $destinos,
            'guias' => $guias,
            'reservas' => $reservas,
            'usuarios' => $users,
        ]);
    }

    public function banearUsuario($id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->isBanned()) {
            // El usuario ya está baneado, realizar acción de desbaneo
            $usuario->unban();
            $message = 'Usuario desbaneado exitosamente.';
        } else {
            // El usuario no está baneado, realizar acción de baneo
            $usuario->banUntil('7 days');
            $message = 'Usuario baneado exitosamente.';
        }

        return redirect()->route('admin.datellesUsuario', $usuario)->with('message', $message);
    }

    public function showCVs()
    {
        // Obtener todos los registros de CV de la base de datos
        $cvs = Empleo::all();

        return view('admin.empleo', compact('cvs'));
    }

    public function downloadCV($id)
    {
        // Obtener el CV por su ID
        $empleo = Empleo::findOrFail($id);

        // Obtener la ruta del archivo adjunto
        $cvPath = $empleo->cv_path;

        // Descargar el archivo PDF
        return response()->download(storage_path('app/' . $cvPath));
    }
}
