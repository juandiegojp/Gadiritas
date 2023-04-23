<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    // Guias
    Route::get('/guias', [GuiaController::class, 'guias'])->name('admin.guias');
    Route::get('/guias/create', [GuiaController::class, 'guiasForm'])->name('admin.guiasCreate');
    Route::post('/guias/create', [GuiaController::class, 'storeGuias'])->name('admin.storeGuias');
    Route::get('/guias/detalles/{guia}', [GuiaController::class, 'datellesGuia'])->name('admin.datellesGuia');
    Route::get('/guias/{guia}/edit', [GuiaController::class, 'editarGuia'])->name('admin.editarGuia');
    Route::put('/guias/{guia}/edit', [GuiaController::class, 'updateGuia'])->name('admin.updateGuia');
    Route::delete('/guias/{guia}/delete', [GuiaController::class, 'borrarGuia'])->name('admin.borrarGuia');

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
});

// Vista inicial cuando arrancas la app.
Route::get('/', function () {
    return view('welcome');
});

// Todas las rutas para los usuarios.
Route::group(['middleware' => ['auth']], function () {
    Route::get('/index', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::post('/resultados', [ActividadController::class, 'busquedaActividades'])->name('usuarios.busquedaActividades');
    Route::get('/resultados/{destino}', [ActividadController::class, 'actividadesResultados'])->name('usuarios.actividades');
    Route::get('/detalles/{destino}', [ActividadController::class, 'detalles'])->name('usuarios.detalles');
    Route::post('/detalles/{destino}', [ReservaController::class, 'crear_reserva'])->name('usuarios.crear_reserva');
    Route::get('/reservas', [ReservaController::class, 'reservaUsers'])->name('usuarios.reservaUsers');
    Route::delete('/reserva/delete', [ReservaController::class, 'borrarReserva'])->name('usuarios.borrarReserva');
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__ . '/auth.php';
