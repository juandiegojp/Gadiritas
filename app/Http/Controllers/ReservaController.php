<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ReservaController extends Controller
{
    /**
     * Dirige a la vista donde se muestran todas las reservas existentes. Panel Admin.
     *
     * @return void
     */
    public function index()
    {
        $reservas = Reserva::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.reservas.index', [
            'reservas' => $reservas,
        ]);
    }

    /**
     * Muestra en una vista los detalles de una reserva.
     *
     * @param  mixed $reserva
     * @return void
     */
    public function detallesReserva(Reserva $reserva)
    {
        return view('admin.reservas.detalles', [
            'reserva' => $reserva,
        ]);
    }

    /**
     * Crea una reserva nueva con el usuario actualmente logeado, obtiene los datos de la reserva por
     * método POST.
     *
     * @param  mixed $request
     * @return void
     */
    public function crear_reserva(Request $request, $transactionId)
    {
        $hora = date('H:i:s', strtotime($request->hora));

        $n_reserva = Reserva::create([
            'actividad_id' => $request->act_id,
            'user_id' => $request->usrID,
            'fecha' => $request->date,
            'hora' => $hora,
            'personas' => $request->n_personas,
            'precio_total' => ($request->precioAct * $request->n_personas),
            'pago_id' => $transactionId,
        ]);

        $mail = new MailController();
        $mail->index($n_reserva);

        if ($request->precioAct == 0) {
            return redirect()->route('usuarios.index')->with('success', '¡La reserva se ha creado correctamente!');
        }
    }

    /**
     * Muestra todas las reservas que tiene el usuario actualmente logeado.
     *
     * @param  mixed $request
     * @return void
     */
    public function reservaUsers(Request $request)
    {
        $comarcas = Destino::select('comarca')
            ->distinct()
            ->orderBy('comarca')
            ->pluck('comarca');
        $destinos = Destino::select('nombre', 'comarca')->get();
        $reservas = Reserva::where('user_id', $request->user()->id)->where('cancelado', false)
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('gadiritas.reservas', compact('reservas', 'comarcas', 'destinos'));
    }

    /**
     * Cancelar la reserva.
     *
     * @param  mixed $request
     * @return void
     */
    public function borrarReserva(Request $request)
    {
        if (Auth::user() || Auth::user()->is_admin) {
            $reserva = $request->input('id');
            Reserva::where('id', $reserva)->update(['cancelado' => true, 'personas' => 0]);
            $mail = new MailController();
            $mail->cancelar();
            if (Auth::user()->is_admin) {
                return redirect('/reservas');
            }
            return redirect('/user/reservas');
        }
    }
}
