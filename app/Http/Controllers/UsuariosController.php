<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Destino;
use App\Models\Empleo;
use App\Models\Reserva;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Muestra todos los usuarios. Panel de ADMIN.
     *
     * @return void
     */
    public function usuarios()
    {
        $reservas = Reserva::all();
        $users = User::where('is_guia', false)
            ->orderBy('is_admin')
            ->get();

        return view('admin.usuarios.index', [
            'reservas' => $reservas,
            'usuarios' => $users,
        ]);
    }

    /**
     * Redirige a la vista del formulario para crear un usuario.
     * Panel de ADMIN.
     *
     * @return void
     */
    public function usuariosForm()
    {
        return view('admin.usuarios.create', []);
    }

    /**
     * Guardar los datos del nuevo usuario en la base de datos.
     *
     * @param  mixed $request
     * @return void
     */
    public function storeUsuarios(Request $request)
    {
        $n_usuario = User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->tlf,
            'password' => Hash::make($request->password1),
            'is_admin' => $request->input('is_admin') ? 'True' : 'False',
            'is_guia' => $request->input('is_guia') ? 'True' : 'False',
        ]);

        if ($n_usuario->is_guia) {
            $mail = new MailController();
            $mail->altaGuia($n_usuario);
        }

        return redirect('/usuarios/detalles/' . $n_usuario->id);
    }

    /**
     * Muestra la vista de los detalles del usuario.
     *
     * @param  mixed $usuario
     * @return void
     */
    public function datellesUsuario(User $usuario)
    {
        return view('admin.usuarios.detalles', [
            'usuario' => $usuario,
        ]);
    }

    /**
     * Vista del formulario para editar los datos del usuario.
     *
     * @param  mixed $usuario
     * @return void
     */
    public function editarUsuario(User $usuario)
    {
        return view('admin.usuarios.editar', [
            'usuario' => $usuario,
        ]);
    }

    /**
     * Actualiza los datos en la base de datos.
     *
     * @param  mixed $request
     * @param  mixed $usuario
     * @return void
     */
    public function updateUsuario(Request $request, User $usuario)
    {
        $usuario->update([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->tlf,
            'password' => Hash::make($request->password1),
            'is_admin' => $request->input('is_admin') ? 'True' : 'False',
            'is_guia' => $request->input('is_guia') ? 'True' : 'False',
        ]);

        return redirect('/usuarios/detalles/' . $usuario->id);
    }

    /**
     * Borra un usuario.
     *
     * @param  mixed $usuario
     * @return void
     */
    public function borrarUsuario(User $usuario)
    {
        $usuario->delete();
        return redirect('/usuarios');
    }

    /**
     * Con esta función devuelve a la vista index de usuarios, las comarcas
     * y todos los destinos que pertenecen a esas comarcas. Esto es útil para el
     * navbar del index de Usuarios.
     *
     * @return void
     */
    public function index()
    {
        $comarcas = Destino::select('comarca')
            ->groupBy('comarca')
            ->orderBy('comarca')
            ->get();
        $destinos = Destino::select('nombre', 'comarca')->get();
        return view('gadiritas.index', [
            'comarcas' => $comarcas,
            'destinos' => $destinos,
        ]);
    }


    public function ShowEmpleoForm()
    {
        return view('gadiritas.empleo');
    }

    public function empleoStore(Request $request)
    {

        // Obtener el archivo adjunto
        $cv = $request->file('cv');

        // Guardar el archivo adjunto en una ubicación específica
        $cvPath = $cv->store('cvs');


        // Crear un nuevo registro en la base de datos
        $empleo = Empleo::create([
            'nombre' => $request->nombre,
            'correo' => $request->email,
            'telefono' => $request->tlf,
            'mensaje' => $request->message,
            'cv_path' => $cvPath,
        ]);

        return redirect()->route('usuarios.empleo')->with('success', 'El formulario ha sido enviado correctamente.');
    }
}
