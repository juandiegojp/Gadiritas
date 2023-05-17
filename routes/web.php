<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaypalController;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Vista inicial cuando arrancas la app.
Route::get('/', function () { return view('welcome'); });

// Sección de empleo (trabaja con nosotros)
Route::get('/empleo', [UsuariosController::class, 'ShowEmpleoForm'])->name('usuarios.empleo');
Route::post('/empleo', [UsuariosController::class, 'empleoStore'])->name('usuarios.enviarCV');

// Administrador
Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

    // Usuarios
    Route::get('/usuarios', [UsuariosController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/usuarios/create', [UsuariosController::class, 'usuariosForm'])->name('admin.usuariosCreate');
    Route::post('/usuarios/create', [UsuariosController::class, 'storeUsuarios'])->name('admin.storeUsuarios');
    Route::get('/usuarios/detalles/{usuario}', [UsuariosController::class, 'datellesUsuario'])->name('admin.datellesUsuario');
    Route::get('/usuarios/{usuario}/edit', [UsuariosController::class, 'editarUsuario'])->name('admin.editarUsuario');
    Route::put('/usuarios/{usuario}/edit', [UsuariosController::class, 'updateUsuario'])->name('admin.updateUsuario');
    Route::delete('/usuarios/{usuario}/delete', [UsuariosController::class, 'borrarUsuario'])->name('admin.borrarUsuario');
    Route::post('/banear-usuario/{id}', [AdminController::class, 'banearUsuario'])->name('admin.banearUsuario');

    // Guias
    Route::get('/guias', [GuiaController::class, 'guias'])->name('admin.guias');
    //Route::get('/guias/create', [GuiaController::class, 'guiasForm'])->name('admin.guiasCreate');
    //Route::post('/guias/create', [GuiaController::class, 'storeGuias'])->name('admin.storeGuias');
    //Route::get('/guias/detalles/{guia}', [GuiaController::class, 'datellesGuia'])->name('admin.datellesGuia');
    //Route::get('/guias/{guia}/edit', [GuiaController::class, 'editarGuia'])->name('admin.editarGuia');
    //Route::put('/guias/{guia}/edit', [GuiaController::class, 'updateGuia'])->name('admin.updateGuia');
    //Route::delete('/guias/{guia}/delete', [GuiaController::class, 'borrarGuia'])->name('admin.borrarGuia');

    // Destinos
    Route::get('/destinos', [DestinoController::class, 'destinos'])->name('admin.destinos');
    Route::get('/destinos/create', [DestinoController::class, 'destinosForm'])->name('admin.destinosCreate');
    Route::post('/destinos/create', [DestinoController::class, 'storeDestinos'])->name('admin.storeDestinos');
    //Route::get('/destinos/detalles/{destino}', [DestinoController::class, 'datellesDestino'])->name('admin.datellesDestino');
    Route::get('/destinos/{destino}/edit', [DestinoController::class, 'editarDestino'])->name('admin.editarDestino');
    Route::put('/destinos/{destino}/edit', [DestinoController::class, 'updateDestino'])->name('admin.updateDestino');
    Route::delete('/destino/delete', [DestinoController::class, 'borrarDestino'])->name('admin.borrarDestino');

    // Actividades
    Route::get('/actividades', [ActividadController::class, 'actividades'])->name('admin.actividades');
    Route::get('/actividades/create', [ActividadController::class, 'actividadesForm'])->name('admin.actividadesCreate');
    Route::post('/actividades/create', [ActividadController::class, 'storeActividades'])->name('admin.storeActividades');
    Route::get('/actividades/detalles/{actividad}', [ActividadController::class, 'datellesActividad'])->name('admin.datellesActividad');
    Route::get('/actividades/{actividad}/edit', [ActividadController::class, 'editarActividad'])->name('admin.editarActividad');
    Route::put('/actividades/{actividad}/edit', [ActividadController::class, 'updateActividad'])->name('admin.updateActividad');
    Route::delete('/actividades/{actividad}/delete', [ActividadController::class, 'borrarActividad'])->name('admin.borrarActividad');

    Route::get('/admin/cvs', [AdminController::class, 'showCVs'])->name('admin.cvs');
    Route::get('/admin/cvs/{id}/download', [AdminController::class, 'downloadCV'])->name('admin.cvs.download');
});

// Todas las rutas para los usuarios.
Route::middleware(['logout.banned', 'auth'])->group(function () {
    Route::get('/index', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::post('/resultados', [ActividadController::class, 'busquedaActividades'])->name('usuarios.busquedaActividades');
    Route::post('/resultados/filtrar', [ActividadController::class, 'filtrar'])->name('actividades.filtrar');
    Route::get('/resultados/{destino}', [ActividadController::class, 'actividadesResultados'])->name('usuarios.actividades');
    Route::get('/detalles/{destino}', [ActividadController::class, 'detalles'])->name('usuarios.detalles');
    Route::post('/detalles/{destino}', [ReservaController::class, 'crear_reserva'])->name('usuarios.crear_reserva');
    Route::post('/actividad/check', [ActividadController::class, 'actividadCheck'])->name('usuarios.actividadCheck');
    Route::post('/detalles/{destino}/comment', [ComentarioController::class, 'store'])->name('usuarios.crearComentario');
    Route::put('/comentarios/{comentarioID}', [ComentarioController::class, 'update'])->name('usuarios.editarComentario');
    Route::post('/comentarios/delete', [ComentarioController::class, 'destroy'])->name('usuarios.borrarComentario');
    Route::get('/reservas', [ReservaController::class, 'reservaUsers'])->name('usuarios.reservaUsers');
    Route::delete('/reserva/delete', [ReservaController::class, 'borrarReserva'])->name('usuarios.borrarReserva');
    Route::get('/paypal/success', [PaypalController::class, 'success'])->name('paypal.success');
    Route::get('/paypal/error', [PaypalController::class, 'error'])->name('paypal.error');
    Route::post('/paypal/checkout', [PaypalController::class, 'checkout'])->name('paypal.checkout');
    Route::post('/paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');
    Route::get('/actividad/pdf/{id}', [ActividadController::class, 'generatePDF'])->name('generar.pdf');
});

Route::group(['middleware' => ['logout.banned', 'auth', 'CheckIsGuia']], function () {
    Route::get('/indexGuia', [GuiaController::class, 'index'])->name('guias.index');
    Route::get('/guia/historial', [GuiaController::class, 'historialTrabajo'])->name('guias.historial');
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
